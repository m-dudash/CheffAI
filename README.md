# CheffAI

**CheffAI** is a web application that helps users cook dishes using artificial intelligence.  
Users type the name of a dish into a chat, and the AI returns: a step-by-step recipe, a list of ingredients, and nutritional information.

---

## 🚀 MVP Features

- Generate a recipe with step-by-step cooking instructions.  
- Get a list of ingredients with exact quantities.  
- Receive nutritional information (calories, proteins, fats, carbohydrates).  
- AI response is returned as JSON for frontend integration.

---

## 🛠 Technologies

- **Backend:** Laravel (PHP)  
- **OpenAI API (GPT-3.5 / GPT-4)**  
- DTOs and service classes for clean architecture  

---

## ⚙ Installation & Setup

1. Clone the repository:

    ```bash
    git clone https://github.com/m-dudash/CheffAI
    cd CheffAi
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Configure `.env`:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Add your OpenAI API key in `.env`:

    ```env
    OPENAI_API_KEY=sk-xxxxxxxxxxxxxxxx
    ```

5. Start the local development server:

    ```bash
    php artisan serve
    ```

---

## 💡 Usage

- The backend exposes an API endpoint to generate recipes.  
- Send a POST request to `/api/recipes` with JSON body:

    ```json
    {
      "dish": "chicken grill"
    }
    ```

- The API will return a JSON response containing:

    - `recipe` – step-by-step instructions  
    - `ingredients` – array of ingredients with quantities  
    - `nutrition` – calories, proteins, fats, carbohydrates  

- Example response:

    ```json
    {
      "recipe": "1. Preheat grill\n2. Season chicken\n3. Grill for 20 minutes\n4. Serve",
      "ingredients": ["Chicken 500g", "Salt 1 tsp", "Pepper 1 tsp"],
      "nutrition": {
        "calories": 500,
        "proteins": 45,
        "fats": 20,
        "carbs": 0
      }
    }
    ```

- You can use this API from any frontend, Postman, or curl for testing.

---

## 📈 Future Plans

- Support for multi-language recipes  
- User authentication and recipe saving  
- Caching requests to reduce API usage and costs  
- Interactive frontend with tabs for recipe, ingredients, and nutrition

---

## 👤 Author

Mykhailo Dudash
