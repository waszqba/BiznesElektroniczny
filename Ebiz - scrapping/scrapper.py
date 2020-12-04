import scrapy


class TravelSpider(scrapy.Spider):
    name = "travelplanet"

    custom_settings = {
        'FEED_EXPORT_ENCODING': 'utf-8'
    }

    start_urls = [
        'https://www.travelplanet.pl/'
    ]


    def parseFinal(self, response):
        for productUrl in response.css('div.container'):
                    if ((productUrl.css('h3.hotel-description__subject::text').get()) is not None):
                        
                            descClean = []
                            for el in (productUrl.css('h3.hotel-description__subject::text, h3.hotel-description__subject+div.hotel-description__details>p::text').getall()):
                                descClean.append(el)

                           
                            descClean = descClean[0:9] 

                            priceClean2 = (productUrl.css('div.basic-value').get()).strip()
                            priceClean2 = priceClean2[84:90]
                            priceClean3 = priceClean2.replace("<", "")
                            priceClean4 = priceClean3.replace("!-", "")


                            if((productUrl.css('input.offer-searcher__cell-input::attr(value)').get()) is None):
                                date = productUrl.css('div.offer-searcher__cell-text::text').get()
                            else:
                                date = productUrl.css('input.offer-searcher__cell-input::attr(value)').get()

                            yield {

                                'breadcrumbs': productUrl.css('nav.breadcrumb-primary>a::text').getall(),
                                'title': (productUrl.css('h1.offer-details-header>a::text').get()).strip(),
                                'discount': productUrl.css('div.promo-badge__discount::text').get(),
                                'date': date,
                                'duration': productUrl.css('span.mdi-calendar-multiple+div::text').get(),
                                'price': priceClean4, 
                                'meals': productUrl.css('div[data-test-id="food_ddl"] div.offer-searcher__cell-text::text').get(),
                                'desc': descClean,
                                'imgSrc': productUrl.css('div.slide-tp-slider img.img-responsive::attr(src)').get()   
                              
                            }

    
    def parseSub(self, response):
       
        for subUrl in response.css('div.container'):
                    if ((subUrl.css('h1.page-header-primary::text').get()) is not None):
                        if (subUrl.css('h3.offer-block__heading>a::text').getall()):

                            for el in (subUrl.css('h3.offer-block__heading>a::attr(href)').getall()):
                                yield scrapy.Request(el, callback=self.parseFinal)

    def parse(self, response):
        for url in response.css('ul.navbar-nav-primary>li'):
           
            for subcatLink in response.css('div.nav-secondary-container>a'):
                yield scrapy.Request(subcatLink.css('a::attr(href)').get(), callback=self.parseSub)
