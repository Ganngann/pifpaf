from playwright.sync_api import Page, expect
import time

def test_pifpaf_registration_flow(page: Page):
    """
    Teste le flux d'inscription d'un nouvel utilisateur et vérifie
    que l'application redirige vers la page de vérification de l'e-mail.
    """
    unique_email = f"test_{int(time.time())}@example.com"

    # Aller à la page d'inscription
    page.goto("http://127.0.0.1:8000/register")

    # Remplir le formulaire d'inscription
    page.locator('[name="name"]').fill("Test User")
    page.locator('[name="email"]').fill(unique_email)
    page.locator('[name="password"]').fill("password")
    page.locator('[name="password_confirmation"]').fill("password")

    # Soumettre le formulaire
    page.get_by_role("button", name="S'inscrire").click()

    # Vérifier que l'URL est correcte
    expect(page).to_have_url("http://127.0.0.1:8000/verify-email")
