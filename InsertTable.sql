/**********************************************************************
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/21/22
 * HOMEWORK: Final Project
 * DESCRIPTION: This file generates the data for Travel Slate.
 **********************************************************************/

INSERT INTO Account VALUES
    ("admin", "travelSlate", "Administration", "Use Only", "admin@travelslate.com"),
    ("dgiacobbi", "1234", "David", "Giacobbi", "dgiacobbi@gmail.com"),
    ("bbarker", "lottoMan23", "Bob", "Barker", "bob@yahoo.com"),
    ("james_gary", "happy335", "James", "Gary", "garyman@aol.com"),
    ("kristy", "fireball28", "Kristine", "Stacy", "kristy@hotmail.com"),
    ("soccerfan225", "35234!%$", "Mary", "Stephenson", "mary@gmail.com"),
    ("JessDay", "teacher4life", "Jessica", "Day", "new_girl@yahoo.com"),
    ("pied-piper", "bigCEO", "Richard", "Hendricks", "rhendricks@piedpiper.com"),
    ("rjohnson", "baseball12", "Ryan", "Johnson", "rj-bat@gmail.com"),
    ("mprestage0", "c1fGeF3n", "Marlo", "Prestage", "mprestage0@deviantart.com"),
    ("cplak1", "RgCS6heBm", "Carson", "Plak", "cplak1@cyberchimps.com"),
    ("kcorby2", "2cCSf6pI", "Kayne", "Corby", "kcorby2@e-recht24.de"),
    ("dhateley3", "dEZ38f", "Dennie", "Hateley", "dhateley3@va.gov"),
    ("cwrate4", "uvAhVL4", "Chucho", "Wrate", "cwrate4@last.fm"),
    ("mduiguid5", "XyAmIFHS2cD", "Mala", "Duiguid", "mduiguid5@woothemes.com"),
    ("fmennithorp6", "V7DGDrCRjzr", "Ferne", "Mennithorp", "fmennithorp6@example.com"),
    ("wlabden7", "5vTCme", "Wayne", "Labden", "wlabden7@so-net.ne.jp"),
    ("vredgrove8", "kuyVupJbfI", "Vivie", "Redgrove", "vredgrove8@instagram.com"),
    ("cbusk9", "KRNul5pyBdsQ", "Charmain", "Busk", "cbusk9@intel.com"),
    ("mcatora", "gJO5Bt7", "Melitta", "Cator", "mcatora@huffingtonpost.com"),
    ("bnorthb", "vYquEtU1h", "Beniamino", "North", "bnorthb@amazon.co.jp"),
    ("atreadawayc", "FkBZrPKYba", "Ami", "Treadaway", "atreadawayc@reddit.com"),
    ("kbembridged", "7Ts6yu", "Katine", "Bembridge", "kbembridged@ucsd.edu"),
    ("mgallee", "ZgdVPfXMDYEg", "Merrick", "Galle", "mgallee@netscape.com"),
    ("agehrtzf", "A7LNNa", "Anatol", "Gehrtz", "agehrtzf@quantcast.com"),
    ("mokinedyg", "poQriwwTrIiU", "Miltie", "O""Kinedy", "mokinedyg@mayoclinic.com"),
    ("rmorrisseyh", "TeWw0nBKD3k", "Rhianon", "Morrissey", "rmorrisseyh@networkadvertising.org"),
    ("bmckennani", "ZvBrf8APdQQW", "Billie", "McKennan", "bmckennani@time.com"),
    ("tbenningtonj", "5M04f7gwz", "Trula", "Bennington", "tbenningtonj@about.me"),
    ("fmorrallk", "Wpq1j6", "Flemming", "Morrall", "fmorrallk@t-online.de"),
    ("nfashionl", "cTalBbd4UxKy", "Natalie", "Fashion", "nfashionl@state.tx.us");

INSERT INTO Location VALUES
    (1, "New York City", "New York", "United States", 1200000, "Metropolitan", "Statue of Liberty", 6),
    (2, "Chicago", "Illinois", "United States", 800000, "Metropolitan", "The Bean", 4),
    (3, "Los Angeles", "California", "United States", 1400000, "Metropolitan", "Griffith Observatory", 7),
    (4, "Phoenix", "Arizona", "United States", 600000, "Metropolitan", "Sonoran Desert", 7),
    (5, "Las Vegas", "Nevada", "United States", 900000, "Metropolitan", "Las Vegas Strip", 5),
    (6, "Bozeman", "Montana", "United States", 128000, "Rustic City", "Yellowstone National Park", 8),
    (7, "Seattle", "Washington", "United States", 800000, "Metropolitan", "Space Needle", 3),
    (8, "Estes Park", "Colorado", "United States", 5900, "Mountain Town", "Rocky Mountains", 8),
    (9, "Williams", "Arizona", "United States", 3200, "Desert Town", "Grand Canyon", 9),
    (10, "Miami", "Florida", "United States", 380000, "Beachfront City", "Miami Beach", 6),
    (11, "Florence", "Tuscany", "Italy", 382000, "Historical City", "The Duomo", 7),
    (12, "Rome", "Lazio", "Italy", 2873000, "Historical City", "The Colosseum", 5),
    (13, "Cinque Terre", "La Spezia", "Italy", 219000, "Oceanside Village", "Vernazza", 8),
    (14, "Venice", "Veneto", "Italy", 261000, "Historical City", "Piazza San Marco", 7),
    (15, "Paris", "Ile de France", "France", 2100000, "Metropolitan", "Eiffel Tower", 6),
    (16, "Nice", "Alpes", "France", 342000, "Beachfront City", "Castle Hill", 10);

INSERT INTO Price VALUES
    ("Overnight Standard", 249.99, 1.5, 0.5),
    ("Overnight Premium", 349.99, 1.5, 0.5),
    ("Overnight Enterprise", 429.99, 1.7, 0.3),
    ("Weekend Standard", 399.99, 2.5, 0.5),
    ("Weekend Premium", 479.99, 2.5, 0.5),
    ("Weekend Enterprise", 549.99, 2.8, 0.2),
    ("Week Standard", 1289.99, 6.5, 0.5),
    ("Week Premium", 1549.99, 6.5, 0.5),
    ("Week Enterprise", 2199.99, 6.8, 0.3);

INSERT INTO Plan VALUES
    (1, "The Florence Enterprise takes the tourist on an extravagant discovery of this beautiful 
        northern Italian town. With an all-inclusive pass to all museums, a private tour guide,
        and paid dinners. The Florence Enterprise is a weekend that will never be forgotten", 9, "Weekend Enterprise", 11),
    (2, "The New York Premium is an excellent way to spend your week away. With tours of the 
         Empire State, the Statue of Liberty, and wonderful lodging, this is a must purchase
         opportunity!", 7, "Week Premium", 1),
    (3, "An overnight in Phoenix? I'm in! The Phoenix overnight standard hits all the high points
         of this gorgeous desert areas. With a hike in the morning and bars at night in downtown
         Phoenix, this overnight lets you experience Phoenix in its fullness", 6, "Overnight Standard", 4),
    (4, "Chicago could not be better visited than in this enterprise week vacation to the windy
         city. With a plays and bars at night and excursions during the day, you will appreciate
         Chicago in a whole new light!", 4, "Week Enterprise", 2),
    (5, "Estes Park is an incredible place to visit for an active weekend away from home. With the 
         Premium package, you will have the ability to hike all of the Rocky Mountains!", 8, "Weekend Premium", 8),
    (6, "Phoenix premium overnight is amazing.", 7, "Overnight Premium", 4),
    (7, "Phoenix enterprise overnight is ASTOUNDING", 8, "Overnight Enterprise", 4),
    (8, "Venice is remarkable, especially with this weekend standard package!", 9, "Weekend Standard", 14),
    (9, "Spend a stupendous time in Rome with the Week Premium package!", 4, "Week Premium", 12),
    (10, "Visit Rome in a new light with the Week Standard package.", 7, "Week Standard", 12),
    (11, "ROME IS EPIC when you use this Week Enterprise package!", 10, "Week Enterprise", 12),
    (12, "Perplexed in Paris??? You will be with this incredible overnight premium!", 3, "Overnight Premium", 15),
    (13, "Speechless in Seattle...I thinks so with this astonishing overnight premium!", 5, "Overnight Premium", 7),
    (14, "Wanna be wonderstruck in Williams, Arizona? You can be if you buy this wonderful overnight standard package", 2, "Overnight Standard", 9),
    (15, "Floored while you explore and do more in Vegas with this extravagant weekend premium.", 1, "Weekend Premium", 5),
    (16, "Flabbergasted in Florence. SIGN ME UP for this weekend extravaganza.", 10, "Weekend Premium", 11),
    (17, "Fabulous Florence can be yours with this wonderful weekend standard.", 3, "Weekend Standard", 11),
    (18, "We forsee a Florence trip in your future with this impossible-to-pass-up week enterprise", 8, "Week Enterprise", 11),
    (19, "Marvelous times in Miami with this crazy overnight premium.", 6, "Overnight Premium", 10),
    (20, "Mind-blowing Miami can be experienced with this overnight standard package", 2, "Overnight Standard", 10),
    (21, "Find out why Bozeman is breathtaking and beguiling with this Week Enterprise package", 3, "Week Enterprise", 6),
    (22, "In love in Los Angeles? I think so if you buy this Weekend Standard package!", 7, "Weekend Standard", 3),
    (23, "Charming Cinque Terre: Fall in love with this captivating sea town with this Overnight Enterprise package", 7, "Overnight Enterprise", 13),
    (24, "Be captivated in Cinque Terre with this extravagant Week Enterprise", 1, "Week Enterprise", 13),
    (25, "Phenomenal time in Paris with this magnificent Overnight Standard package", 8, "Overnight Standard", 15),
    (26, "Notable times in Nice with this noticable Week Premium package", 6, "Week Premium", 16),
    (27, "Normal time in Nice...I think NOT with this cool Week Standard package", 8, "Week Standard", 16),
    (28, "Niminy-Piminy times in Nice with the overnight enterprise package", 2, "Overnight Enterprise", 16),
    (29, "Shocking Chicago is what you will think with this overnight enterprise", 7, "Overnight Enterprise", 2),
    (30, "Shake it up Chicago with this super fun week premium", 4, "Week Premium", 2);

INSERT INTO SavedPlan VALUES
    ("dgiacobbi", 1),
    ("dgiacobbi", 2),
    ("dgiacobbi", 3),
    ("dgiacobbi", 4);

INSERT INTO Review (title, description, rating, plan_id, user) VALUES
    ("Best Weekend EVER!", "This weekend went above and beyone my standards I had for
    this vacation. Although pricey, the all-inclusive aspect made this trip stress-free and truly
    a weekend I will never ever forget. Would definitely reccommend!!!", 10, 1, "dgiacobbi"),
    ("New York. New Me.", "Spending a week in New York was just what I needed! This trip has 
    anything you could ask for. I wish we could have gone to a baseball game, but I guess
    I will just have to wait until next time!", 8, 2, "dgiacobbi"),
    ("Decent Accomodations, Would Not Reccommend.", "This overnight in Phoenix was a regrettable
    trip with not much to do or see. The living conditions were horrible.", 2, 3, "rjohnson");

-- SELECT * FROM to displaty tables:
SELECT * FROM Review;
SELECT * FROM SavedPlan;
SELECT * FROM Plan;
SELECT * FROM Price;
SELECT * FROM Location;
SELECT * FROM Account;