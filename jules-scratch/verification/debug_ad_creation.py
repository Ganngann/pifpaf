
import asyncio
from playwright.async_api import async_playwright, expect

async def main():
    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=True)
        page = await browser.new_page()

        # 1. Login directly
        await page.goto("http://localhost:8000/login")
        await page.get_by_label("Adresse e-mail").fill("jules.test@example.com")
        await page.get_by_label("Mot de passe").fill("password123")
        await page.get_by_role("button", name="Se connecter").click()
        await expect(page).to_have_url("http://localhost:8000/dashboard", timeout=10000)

        # 2. Go to Ad Creation Page
        await page.get_by_role("link", name="Vendre").click()
        await expect(page).to_have_url("http://localhost:8000/ads/create")

        # 3. Fill Ad Form
        await page.get_by_label("Titre").fill("Test Annonce")
        await page.get_by_label("Description").fill("Test Description")
        await page.get_by_label("Prix").fill("10")
        await page.get_by_label("Catégorie").select_option("other")
        await page.get_by_label("État").select_option("good")
        await page.get_by_label("Images").set_input_files("jules-scratch/verification/images/test_image.png")

        # 4. Submit
        await page.get_by_role("button", name="Publier").click()

        # 5. DEBUG: Capture result
        await page.wait_for_load_state('networkidle')
        html_content = await page.content()
        with open("jules-scratch/verification/debug_result.html", "w") as f:
            f.write(html_content)
        await page.screenshot(path="jules-scratch/verification/debug_screenshot.png")
        print("Debug HTML and screenshot saved.")

        await browser.close()

if __name__ == "__main__":
    asyncio.run(main())
