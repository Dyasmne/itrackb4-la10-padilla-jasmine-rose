 ITRACKB4 Laboratory Activity 6
 Two Filters, One Route

 Q1. You added a second filter without adding a single route. Explain why no new route was needed. Your answer should say something about what the router actually looks at.

No new route was needed because the router only looks at the URL path and HTTP method to decide which controller action to call. The second filter is handled inside the same controller method using the request/query data, so the URL route itself did not change.

 Q2. Suppose you had built both filters as route parameters instead. Describe what the URL for 'year 4 only, no course filter' would have to look like, and why.

The URL would need to include both route parameters in the required order. For example, if the pattern were /movies/{year}/{course}, then for year 4 only with no course filter, you would still need something like /movies/4/all (or another placeholder value). This is because route parameters are part of the URL pattern, so the second parameter cannot simply be left out.

Q3. Your navigation link stays marked on a detail page and also when a filter is applied. Only one of those two needed a change to your pattern. Say which one, and why the other needed nothing.

TThe detail-page pattern needed the change. The navigation link could stay as it was because it already points to the correct movies.index route. The detail page needed its active-state pattern adjusted so it would not incorrectly mark the Movies navigation as active when viewing a specific movie.

Q4. You deleted your old filter method but kept the empty store and update methods, even though none of the three can be reached by a URL. Explain the difference between them.

the old filter method was deleted because it was no longer needed after moving the filtering logic into the existing index method. The empty store and update methods are different: they are controller methods reserved for resource-controller actions, even though no URL currently reaches them because the routes are filtered/limited.