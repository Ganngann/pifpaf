import re
from playwright.sync_api import Page, expect
import logging

logging.basicConfig(level=logging.INFO)

def test_pifpaf_flow(page: Page):
    logging.info("Starting Playwright test...")

    # 1. Inscription
    page.goto("http://127.0.0.1:8000/register")
    page.screenshot(path="screenshot.png")
    page.get_by_label("Nom").fill("Test User")
    page.get_by_label("Email").fill("test@example.com")
    page.get_by_label("Mot de passe", exact=True).fill("password")
    page.get_by_label("Confirmer le mot de passe").fill("password")
    page.get_by_role("button", name="S'inscrire").click()
    expect(page.get_by_role("heading", name="Dashboard")).to_be_visible()
    logging.info("Registration successful.")

    # 2. Création d'une annonce
    page.goto("http://127.0.0.1:8000/ads/create")
    page.get_by_label("Titre").fill("Annonce de test")
    page.get_by_label("Description").fill("Description de l'annonce de test")
    page.get_by_label("Prix").fill("100")
    page.get_by_label("Catégorie").fill("Catégorie de test")
    page.get_by_label("État").fill("Neuf")
    page.get_by_label("Images").set_input_files("tests/e2e/test_image.jpg")
    page.get_by_role("button", name="Créer l'annonce").click()
    expect(page.get_by_text("Annonce créée avec succès !")).to_be_visible()
    logging.info("Ad creation successful.")

    # 3. Recherche
    page.goto("http://127.0.0.1:8000")
    page.get_by_placeholder("Rechercher...").fill("test")
    page.get_by_role("button", name="Rechercher").click()
    expect(page.get_by_text("Annonce de test")).to_be_visible()
    logging.info("Search successful.")
