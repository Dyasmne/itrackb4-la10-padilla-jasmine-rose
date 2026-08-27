# ITRACKB4 Laboratory Activity 3

## Q1. Explain the order you placed your featured route and your detail route in, and what would happen if you swapped them?
I ordered the `/movies/featured` route before `/movies/{id}`because Laravel goes through routes from top to bottom and picks the first one that matches. If I reversed these, Laravel may see the featured page as a ID value thus the featured content would not hit the proper controller function.

## Q2. What happens when someone visits an id that does not exist in your data, and what did you write to make that happen?
When a person requests an ID that does not exist at all, for example going to `/movies/999`, the app will present a 404 Not Found page. I used `isset()` to see if the movie is present and put in `abort(404)` when it is not.

## Q3. Why do your links use route names instead of typed URLs? Give one concrete thing that would break if they did not.
My links use route names which makes Laravel generate the right URL. For instance if I change the base /movies URL in my route file the Movie List back link will still work without me to touch the Blade file. If I were to use a hard coded URL the link may point to the old URL and cause a 404 error.status