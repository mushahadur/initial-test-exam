<p align="center">
 <!-- <img width="100px" src="./public/frontend/img/1.png" align="center" alt="Logo" /> -->
 <h2 align="center">Initial Test Exam</h2>
 <p align="center"></p>
</p>


## Indexing
- [About Project](#about)
- [Core Features](#features)
- [Technical Requirements](#technology)
- [Installing  Project](#installing)


<br>
<br>

<hr>

### About Project <a name="about"></a>
This project aims to develop a streamlined product catalog with a shopping cart and a dynamic discount system, emphasizing fundamental Laravel development skills. The implementation will leverage Blade templates for server-side rendering and JavaScript for interactive cart updates. While maintaining simplicity, the project introduces an advanced feature—custom discount logic—to assess the candidate's problem-solving abilities. Designed to be completed within a three-hour time frame, this project tests the candidate’s proficiency in Laravel, frontend integration, and efficient coding practices under time constraints.

<hr>

### Use of Technology <a name="technology"></a>

1. Backend:
  - - Laravel (latest stable version).
  - - Use a hardcoded array of products (no database needed).

2. Frontend:
  - - Use Blade templates for server-side rendering.
  - - Add JavaScript for dynamic cart updates (e.g., updating the total when a product is added/removed).

3. Discount Logic:
  - - Implement the discount logic in JavaScript or PHP (candidate's choice).
  - - Ensure the discount is calculated and displayed correctly.

<br>
<br>


<hr>

### Core Features <a name="features"></a>
 
1. Product Listing:

- Display a list of products with:
  - - Name
  - - Price (in USD)
  - - Add to Cart button.

2. Shopping Cart:
  - - Users can add/remove products to/from their cart.
  - - Use session storage to persist the cart (no database needed).
  - - Display the cart total dynamically using JavaScript.

3. Discount Logic:
#### Implement a custom discount system where:
  - - If a user adds 3 or more products to the cart, they get a 10% discount.
  - - The discount should be applied dynamically and reflected in the cart total.
<br>
<br>

<hr>

### Use of Technology <a name="technology"></a>

1. Backend:
  - - Laravel (latest stable version).
  - - Use a hardcoded array of products (no database needed).

2. Frontend:
  - - Use Blade templates for server-side rendering.
  - - Add JavaScript for dynamic cart updates (e.g., updating the total when a product is added/removed).

3. Discount Logic:
  - - Implement the discount logic in JavaScript or PHP (candidate's choice).
  - - Ensure the discount is calculated and displayed correctly.

<br>
<br>
<hr>

### Installing Project <a name="installing"></a>
It is php 8.3.6 version
- git clone
- composer install
- php artisan key:generate
- Setup .env file 

- php artisan serve