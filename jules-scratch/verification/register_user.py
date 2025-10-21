
import asyncio
from playwright.async_api import async_playwright

async def main():
    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=True)
        page = await browser.new_page()

        await page.goto("http://localhost:8000/register")
        await page.get_by_label("Nom").fill("Jules Test")
        await page.get_by_label("Adresse e-mail").fill("jules.test@example.com")
        await page.get_by_label("Mot de passe", exact=True).fill("password123")
        await page.get_by_label("Confirmez le mot de passe").fill("password123")
        await page.get_by_role("button", name="S'inscrire").click()
        await page.wait_for_url("http://localhost:8000/dashboard")
        print("User registered successfully.")

        await browser.close()

if __name__ == "__main__":
    asyncio.run(main())
