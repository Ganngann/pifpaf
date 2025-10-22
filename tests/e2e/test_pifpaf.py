from playwright.sync_api import Page, expect
import time
import subprocess

def test_pifpaf_registration_flow(page: Page):
    """
    Tente le flux d'inscription d'un nouvel utilisateur.
    NOTE : Ce test échoue actuellement car la soumission du formulaire
    ne redirige pas l'utilisateur. Le problème semble être une interaction
    subtile entre Playwright et le formulaire de l'application.
    L'infrastructure de test est en place, mais ce problème doit être
    résolu pour que les tests E2E soient fonctionnels.
    """
    unique_email = f"test_{int(time.time())}@example.com"

    # Aller à la page d'inscription
    page.goto("http://127.0.0.1:8000/register")

    # Remplir le formulaire d'inscription
    page.locator('[name="name"]').fill("Test User Flow")
    page.locator('[name="email"]').fill(unique_email)
    page.locator('[name="password"]').fill("password")
    page.locator('[name="password_confirmation"]').fill("password")

    # Soumettre le formulaire
    page.get_by_role("button", name="S'inscrire").click()

    # Le test s'arrête ici car l'étape suivante échoue.
    # L'attente devrait être que l'URL devienne /verify-email.
    expect(page).to_have_url("http://127.0.0.1:8000/verify-email", timeout=1000) # timeout court pour échouer rapidement
