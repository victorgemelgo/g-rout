# Simple PHP Router

This is a simple PHP routing system that allows you to define routes and link them to specific actions, such as rendering views or handling form submissions. The project also demonstrates basic form validation with `$_POST` data.

## Project Structure

/project /controllers # Optional, if using controllers HomeController.php AboutController.php /views # Contains the HTML views home.php about.php /routes # Contains route definitions web.php # Defines all routes Router.php # The Router class index.php # Main entry point of the application formulario.html # Example form that sends POST requests


## Requirements

- PHP 7.4 or higher
- A web server (e.g., Apache or Nginx)

## How It Works

This project provides a basic routing system that supports the following features:

1. **GET Routes**: Render views for specific pages (e.g., homepage, about page).
2. **POST Routes**: Handle form submissions and perform validation on the `$_POST` data without rendering a view.

### Example GET Route

In `routes/web.php`, the following code renders a view for the homepage:

```php
$router->addRoute('GET', '', function() {
    renderView('home');
});
```

Example POST Route
In routes/web.php, the following code handles form submissions, validates the data, and sends a success or error message:

```php
$router->addRoute('POST', 'contact', function() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';

        // Simple validation
        if (empty($name) || empty($email)) {
            echo "Name and email are required!";
        } else {
            // Process the data (e.g., save to database, send email)
            echo "Form submitted successfully! Name: {$name}, Email: {$email}";
        }
    }
});
```

Redirect After Successful Submission
You can also redirect the user to another page after successful form submission. Here's an example:

```php
$router->addRoute('POST', 'contact', function() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';

        if (empty($name) || empty($email)) {
            echo "Name and email are required!";
        } else {
            // Process the data
            echo "Form submitted successfully!";
            
            // Redirect to a thank you page
            header('Location: /thank-you');
            exit;
        }
    }
});
```
Setting Up
1. Clone the Repository
Clone this repository to your local machine:

```
git clone https://github.com/your-username/simple-php-router.git
cd simple-php-router
```
2. Set Up the Web Server
You can use a local web server (e.g., XAMPP, MAMP, or built-in PHP server) to run this project.

To run using PHP's built-in server, use the following command:
```
php -S localhost:8000
```

Visit http://localhost:8000 in your browser.

3. Update the Routes
Open the routes/web.php file to define or modify routes as needed. For example:

```php
$router->addRoute('GET', '', function() {
    renderView('home');
});
```
Add more routes for different pages or API endpoints.

4. Create Your Views
Add your view files (e.g., home.php, about.php) in the views/ directory. Each view is just a regular PHP file that will be rendered when its corresponding route is accessed.

5. Handling Forms
If you're using forms, define POST routes in routes/web.php and ensure your form's action points to the correct URL (e.g., /contact).

For example:
```html
<form action="/contact" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <button type="submit">Submit</button>
</form>
```

6. Rendering Views
The renderView() function is used to render views. It looks for a PHP file in the views/ directory with the same name as the view you want to render.

For example:
```php
function renderView($view) {
    $viewFile = __DIR__ . "/views/{$view}.php";
    if (file_exists($viewFile)) {
        include $viewFile;
    } else {
        echo "View not found: {$view}";
    }
}
```
7. Customize the Application
You can add more advanced features, such as:

Dynamic Routes: Use parameters in routes (e.g., /user/{id}).
Middlewares: Add middleware for authentication, logging, etc.
Error Handling: Customize error handling for 404 or 500 errors.

## Contributing
Feel free to fork this project and submit pull requests with improvements or fixes.

## License
This project is licensed under the MIT License - see the LICENSE file for details.


### Summary of the README Sections:

1. **Project Overview**: Brief description of the project and its core features.
2. **Project Structure**: Overview of how the files and folders are structured.
3. **How It Works**: Explanation of how the routing system works for both `GET` and `POST` requests.
4. **Setting Up**: Instructions on how to clone and run the project locally.
5. **Customization**: How to modify routes, views, and form submissions.
6. **Contributing**: Encouraging others to contribute to the project.
7. **License**: A placeholder for license information (you can specify the license if applicable).

This `README.md` will help anyone who comes across your project to quickly understand how to use it, set it up, and make modifications.

