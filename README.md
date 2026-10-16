 ITRACKB4 Laboratory Activity 9

F1. Which column did you make nullable, and why that one and not another?

I made the release_year column nullable because a movie's release year may not always be available. The movie can still be saved even if its release year is unknown. I kept the other columns required because they contain important information about the movie.

F2. Which step failed first for you, and what did the error say?

The migration initially created the movies table without the required custom columns. When I checked the table structure, I noticed that the columns were missing. I rolled back the migration, updated the migration file, and ran the migration again to create the correct table structure.

F3. You changed no Blade file in Part D, yet your pages still work. Why not?

The Blade files still work because the controller passes the movie data to the views using the same variable names and structure expected by the templates. I changed the data source from the JSON file to the database, but I kept the view names and the data passed to the views consistent.
