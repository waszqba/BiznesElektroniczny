class QuotesSpider(scrapy.Spider):
    name = "tui2"

    custom_settings = {
        'FEED_EXPORT_ENCODING': 'utf-8'
    }

    start_urls = [
        'https://www.travelplanet.pl/'
    ]


    def parseFinal(self, response, main_url, linkOne, linkTwo, links, subLinks, allLinks2):
        dict(
        main_url=main_url,
        other_url=response.url,
        linkOne=linkOne,
        linkTwo=linkTwo,
        links=links,
        subLinks=subLinks,
        allLinks2=allLinks2
        )
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
            if '?category' in response.request.url:
                    if ((productUrl.css('h3.hotel-description__subject::text').get()) is not None):

                            category = ((response.request.url).split("?category=",1)[1])
                            category = category.replace("-", " ")
                            categorySub = ((response.request.url).split("wczasy/",1)[1])
                            categorySub2 = categorySub.split("/")[0]
                            categorySub3 = categorySub2.replace("-", " ")

                            descClean = []
                            for el in (productUrl.css('h3.hotel-description__subject, h3.hotel-description__subject+div.hotel-description__details>p').getall()):
                                descClean.append(el)
    
                            descClean = descClean[0:9] 

                            priceClean2 = (productUrl.css('div.basic-value').get()).strip()
                            priceClean2 = priceClean2[84:90]
                            priceClean3 = priceClean2.replace("<", "")
                            priceClean4 = priceClean3.replace("!-", "")

                            for el in allLinks3:
                                if(categorySub3 == el) or (category == el):
                                    if((productUrl.css('input.offer-searcher__cell-input::attr(value)').get()) is None):
                                        date = productUrl.css('div.offer-searcher__cell-text::text').get()
                                    else:
                                        date = productUrl.css('input.offer-searcher__cell-input::attr(value)').get()

                                    discount = productUrl.css('div.promo-badge__discount::text').get()
                                    
                                    if(discount is not None):
                                   
                                        discount = discount.replace("-", "")
                                        discount = discount.replace("%", "")

                                    categories = [productUrl.css('nav.breadcrumb-primary>a::text').get(), category, categorySub3]

                                    features2 = [
                                        'Data rozpoczęcia:' + date, 
                                        'Czas Trwania:' + productUrl.css('span.mdi-calendar-multiple+div::text').get(),
                                        'Posiłki:' + productUrl.css('div[data-test-id="food_ddl"] div.offer-searcher__cell-text::text').get(), 
                                        'Wylot z:' + productUrl.css('div[data-test-id="from_city_ddl"] div.offer-searcher__cell-text::text').get(),
                                        'Operator:' + productUrl.css('div[id="sbtn--operator"] div.offer-searcher__cell-text::text').get(),
                                    ]

                                    yield {
                                        'categories': categories,
                                        'discount': discount,
                                        'features2': features2,
                                        'title': (productUrl.css('h1.offer-details-header>a::text').get()).strip(),
                                        'price': priceClean4, 
                                        'desc': descClean,
                                        'imgSrc': productUrl.css('div.slide-tp-slider img.img-responsive::attr(src)').get(),   
                                        'active': 1
                                    }


    def parseSub(self, response, main_url, linkOne, links, subLinks, allLinks2):

        dict(
        main_url=main_url,
        other_url=response.url,
        linkOne=linkOne,
        links=links,
        subLinks=subLinks,
        allLinks2=allLinks2
        )

        for subUrl in response.css('div.container'):
                    if ((subUrl.css('h1.page-header-primary::text').get()) is not None):
                        if (subUrl.css('h3.offer-block__heading>a::text').getall()):

     
                            linksTwo = subUrl.css('h3.offer-block__heading>a::text').getall()
                            for index, el in enumerate(subUrl.css('h3.offer-block__heading>a::attr(href)').getall()):
                                request = scrapy.Request(el, callback=self.parseFinal, cb_kwargs=dict(main_url=response.url))
                                request.cb_kwargs['linkOne'] = linkOne
                                request.cb_kwargs['linkTwo'] = (index, linksTwo)
                                request.cb_kwargs['links'] = links
                                request.cb_kwargs['subLinks'] = subLinks
                                request.cb_kwargs['allLinks2'] = allLinks2
                                yield request

        request = scrapy.Request((response.request.url + '/2/'), callback=self.parseSub, cb_kwargs=dict(main_url=response.url))
        request.cb_kwargs['linkOne'] = linkOne
        request.cb_kwargs['links'] = links
        request.cb_kwargs['subLinks'] = subLinks
        request.cb_kwargs['allLinks2'] = allLinks2
        yield request
                        

    def parse(self, response):
        allLinks2 = []
        links = response.css('ul.navbar-nav-primary>li>a::text').getall()
        for link in links:
            if ((link.strip()) != ""):

                allLinks2.append(link.strip())
        sclinks = []
        sclinksText = []
        for url in response.css('ul.navbar-nav-primary>li'):
            if ((url.css('li>a::text').get()) is not None):
                if (url.css('nav.nav-secondary>div>a::text').getall()):
                    sclinks = url.css('nav.nav-secondary>div>a::attr(href)').getall()
                    sclinksText = url.css('nav.nav-secondary>div>a::text').getall()

            for subcatLink in sclinksText:

                allLinks2.append(subcatLink)
            for subcatLink in sclinks:

                request = scrapy.Request(subcatLink, callback=self.parseSub, cb_kwargs=dict(main_url=response.url))
                request.cb_kwargs['linkOne'] = subcatLink
                request.cb_kwargs['links'] = links
                request.cb_kwargs['subLinks'] = sclinksText
                request.cb_kwargs['allLinks2'] = allLinks2
                yield request
