 ITRACKB4 Laboratory Activity 7
 Let Them Add Someting

 Q1. Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead.

If the form used GET, the submitted data would be added to the URL as query parameters. This is not suitable for adding a new movie because the data would become visible in the browser address bar. When the browser is refreshed, it can repeat the GET request, which may cause the same action to happen again and create duplicate records. Using POST is better because the form data is sent in the request body.

 Q2. When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.

Laravel's `validate()` method automatically handles the validation. If the submitted data is invalid, Laravel stops the rest of the controller method before the saving code runs. It redirects the visitor back to the form and provides the validation errors and old input values, so the user can correct the fields.

Q3. Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.

The layout checks for a `success` session value using `session('success')`. The message is only added to the session after a successful movie is saved using `with('success', ...)`. After the message is displayed, the session flash data is removed, so it does not continue appearing on other pages.
