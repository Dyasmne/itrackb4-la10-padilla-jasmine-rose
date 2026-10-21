 ITRACKB4 Laboratory Activity 10

G1: Which column did you turn into a table, and why that one and not another?
I turned genre into its own table because it comes from a fixed list of values that repeat across many movies. If a genre ever needs its own details, like a description, it’s easy to add. Rating, release year, and availability describe each movie individually, so they stay as columns.

G2: What number did screenshot 6 show, and why exactly that number?
Screenshot 6 showed 7. There are 6 movies on the page. Without with(), Laravel runs one query to load the movies, then another query each time the view reads $movie->genre->name. That’s 1 + 6 = 7. The Genre::all() query for the filter links isn’t counted because it runs before the query log is turned on.

G3: Your belongsTo method is named in the singular. What would break if you made it plural?
Eloquent uses the method name to figure out the foreign key column by adding _id. If I named it genres(), Laravel would look for a genres_id column, which doesn’t exist in my table. That would throw an SQL error, and the page would crash on the $movie->genre->name line.