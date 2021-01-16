
class QuotesSpider(scrapy.Spider):
    name = "ebiz"

    custom_settings = {
        'FEED_EXPORT_ENCODING': 'utf-8',
    }

    start_urls = [
        'https://www.travelplanet.pl/'
    ]

    ########################################################################

    #pobranie informacji o kazdym produkcie
    def parseFinal(self, response, main_url, one_linkContent, two_linkContent, 
    linkOne, linkTwo, links, subLinks, allLinks2, unique):
        #informacje przekazane z poprzednich podstron
        dict(
        main_url=main_url,
        other_url=response.url,
        one_linkContent = one_linkContent,
        two_linkContent = two_linkContent,
        linkOne=linkOne,
        linkTwo=linkTwo,
        links=links,
        subLinks=subLinks,
        allLinks2=allLinks2,
        unique=unique
        )
       
        #przygotowanie do umieszczenia w csv - usuniecie zbednych znakow z pobranej tresci

        allLinks = []

        allLinks3 = []
        for el in allLinks2:
            allLinks3.append(el.lower())

        linksClean = []
        for link in links:
            if ((link.strip()) is not ""):
                linksClean.append((link.strip()).lower())
                allLinks.append((link.strip()).lower())

        subLinksClean = []
        for subLink in subLinks:
            subLinksClean.append(subLink.lower())
            allLinks.append(subLink.lower())
            for productUrl in response.css('div.container'):
                    if ((productUrl.css('h3.hotel-description__subject::text').get()) is not None):
            
                            descClean = []
                            for el in (productUrl.css('h3.hotel-description__subject, h3.hotel-description__subject+div.hotel-description__details>p').getall()):
                                descClean.append(el)

                            priceClean2 = (productUrl.css('div.basic-value').get()).strip()
                            priceClean2 = priceClean2[84:90]
                            priceClean3 = priceClean2.replace("<", "")
                            priceClean4 = priceClean3.replace("!-", "")
                            priceClean5 = priceClean4.replace(u'\xa0', "")
                            
                            for el in allLinks3:
                                    if((productUrl.css('input.offer-searcher__cell-input::attr(value)').get()) is None):
                                        date = productUrl.css('div.offer-searcher__cell-text::text').get()
                                    else:
                                        date = productUrl.css('input.offer-searcher__cell-input::attr(value)').get()

                                    discount = productUrl.css('div.promo-badge__discount::text').get()
                                    
                                    if(discount is not None):
                                    
                                        discount = discount.replace("-", "")
                                        discount = discount.replace("%", "")

                                        #informacje o kazdym produkcie

                                    features2 = [
                                        'Data rozpoczęcia:' + date, 
                                        'Czas Trwania:' + productUrl.css('span.mdi-calendar-multiple+div::text').get(),
                                        'Posiłki:' + productUrl.css('div[data-test-id="food_ddl"] div.offer-searcher__cell-text::text').get(), 
                                        'Wylot z:' + productUrl.css('div[data-test-id="from_city_ddl"] div.offer-searcher__cell-text::text').get(),
                                        'Operator:' + productUrl.css('div[id="sbtn--operator"] div.offer-searcher__cell-text::text').get(),
                                    ]
                                    if(((productUrl.css('h1.offer-details-header>a::text').get()).strip()) not in unique):
                                        yield {
                                            'kategorie': [productUrl.css('nav.breadcrumb-primary>a::text').get(), one_linkContent, two_linkContent],
                                            'procent rabatu': discount,
                                            'cechy': features2,
                                            'nazwa': (productUrl.css('h1.offer-details-header>a::text').get()).strip(),
                                            'cena brutto': priceClean5, 
                                            'opis': descClean,
                                            'imgSrc': productUrl.css('div.slide-tp-slider img.img-responsive::attr(src)').get(),   
                                            'aktywny': 1
                                        }
                                        unique.append((productUrl.css('h1.offer-details-header>a::text').get()).strip())

    
    ########################################################################

    #obsluga strony z wycieczkami z kazdej podkategorii

    def parseSub(self, response, main_url, one_linkContent, 
    two_linkContent, linkOne, links, subLinks, allLinks2, unique):

        dict(
        main_url=main_url,
        other_url=response.url,
        one_linkContent = one_linkContent,
        two_linkContent = two_linkContent,
        linkOne=linkOne,
        links=links,
        subLinks=subLinks,
        allLinks2=allLinks2,
        unique=unique
        )

        for subUrl in response.css('div.container'):
                    if ((subUrl.css('h1.page-header-primary::text').get()) is not None):
                        if (subUrl.css('h3.offer-block__heading>a::text').getall()):

                            #finalny request do strony kazdej wycieczki

                            linksTwo = subUrl.css('h3.offer-block__heading>a::text').getall()
                            for index, el in enumerate(subUrl.css('h3.offer-block__heading>a::attr(href)').getall()):
                                request = scrapy.Request(el, callback=self.parseFinal, cb_kwargs=dict(main_url=response.url))
                                request.cb_kwargs['linkOne'] = linkOne
                                request.cb_kwargs['one_linkContent'] = one_linkContent
                                request.cb_kwargs['two_linkContent'] = two_linkContent
                                request.cb_kwargs['linkTwo'] = (index, linksTwo)
                                request.cb_kwargs['links'] = links
                                request.cb_kwargs['subLinks'] = subLinks
                                request.cb_kwargs['allLinks2'] = allLinks2
                                request.cb_kwargs['unique'] = unique
                                yield request

        #request do drugiej strony z produktami z kazdej z podkategorii

        request = scrapy.Request((response.request.url + '2/'), 
        callback=self.parseSub, cb_kwargs=dict(main_url=response.url))
        request.cb_kwargs['one_linkContent'] = one_linkContent
        request.cb_kwargs['two_linkContent'] = two_linkContent
        request.cb_kwargs['linkOne'] = linkOne
        request.cb_kwargs['links'] = links
        request.cb_kwargs['subLinks'] = subLinks
        request.cb_kwargs['allLinks2'] = allLinks2
        request.cb_kwargs['unique'] = unique
        yield request
                        
    ########################################################################

    def parse(self, response):
        
        allLinks2 = []
        links = response.css('ul.navbar-nav-primary>li>a::text').getall()
        for link in links:
            if ((link.strip()) != ""):

                allLinks2.append(link.strip())
        unique = []
        sclinks = []
        sclinksText = []
        
        for url in response.css('ul.navbar-nav-primary>li'): #link z glownego menu
            if ((url.css('li>a::text').get()) is not None):
                if (url.css('nav.nav-secondary>div>a::text').getall()):
                    sclinks = url.css('nav.nav-secondary>div>a::attr(href)').getall() #linki podkategorii
                    sclinksText = url.css('nav.nav-secondary>div>a::text').getall()

            i = 0
            for subcatLink in sclinksText:
            
                allLinks2.append(subcatLink)
            for subcatLink in sclinks:
                
                request = scrapy.Request(subcatLink, callback=self.parseSub, 
                cb_kwargs=dict(main_url=response.url)) #request do podstrony podkategorii
                
                request.cb_kwargs['one_linkContent'] = (url.css('li>a::text').get()).strip() 
                request.cb_kwargs['two_linkContent'] = sclinksText[i] 
                request.cb_kwargs['linkOne'] = subcatLink
                request.cb_kwargs['links'] = links
                request.cb_kwargs['subLinks'] = sclinksText
                request.cb_kwargs['allLinks2'] = allLinks2
                request.cb_kwargs['unique'] = unique
                yield request
                i+=1

                #tresc linkow, hrefy