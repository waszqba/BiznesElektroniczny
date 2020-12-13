const puppeteer = require('puppeteer');

(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    await page.goto('http://127.0.0.1:5000');
    await page.screenshot({path: 'screenshot.png'});

    await browser.close();
})();
