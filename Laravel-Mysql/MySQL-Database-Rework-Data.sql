-- laravelweb_users
INSERT INTO laravelweb_users (user_name, display_name, email, password, address, phone, created_at, updated_at) VALUES
('john_doe', 'John Doe', 'john.doe@example.com', 'hashed_password_1', '123 Main St', '555-0101', NOW(), NOW()),
('jane_smith', 'Jane Smith', 'jane.smith@example.com', 'hashed_password_2', '456 Oak Ave', '555-0102', NOW(), NOW()),
('alice_jones', 'Alice Jones', 'alice.jones@example.com', 'hashed_password_3', '789 Pine Rd', '555-0103', NOW(), NOW()),
('bob_brown', 'Bob Brown', 'bob.brown@example.com', 'hashed_password_4', '101 Elm St', '555-0104', NOW(), NOW()),
('emma_wilson', 'Emma Wilson', 'emma.wilson@example.com', 'hashed_password_5', '202 Birch Ln', '555-0105', NOW(), NOW()),
('david_martin', 'David Martin', 'david.martin@example.com', 'hashed_password_6', '303 Cedar Dr', '555-0106', NOW(), NOW()),
('sarah_moore', 'Sarah Moore', 'sarah.moore@example.com', 'hashed_password_7', '404 Maple Ave', '555-0107', NOW(), NOW()),
('mike_taylor', 'Mike Taylor', 'mike.taylor@example.com', 'hashed_password_8', '505 Willow Rd', '555-0108', NOW(), NOW()),
('lisa_white', 'Lisa White', 'lisa.white@example.com', 'hashed_password_9', '606 Spruce St', '555-0109', NOW(), NOW()),
('chris_green', 'Chris Green', 'chris.green@example.com', 'hashed_password_10', '707 Ash Ln', '555-0110', NOW(), NOW());

-- laravelweb_categories
INSERT INTO laravelweb_categories (name, post_type, slug, meta_title, meta_description, created_at, updated_at) VALUES
('Technology', 'post', 'technology', 'Technology News', 'Latest updates in tech', NOW(), NOW()),
('Lifestyle', 'post', 'lifestyle', 'Lifestyle Tips', 'Best lifestyle advice', NOW(), NOW()),
('Health', 'post', 'health', 'Health Updates', 'Stay healthy with our tips', NOW(), NOW()),
('Travel', 'post', 'travel', 'Travel Guides', 'Explore the world', NOW(), NOW()),
('Food', 'post', 'food', 'Food Recipes', 'Delicious recipes for you', NOW(), NOW()),
('Fashion', 'post', 'fashion', 'Fashion Trends', 'Latest fashion updates', NOW(), NOW()),
('Education', 'post', 'education', 'Education News', 'Learn something new', NOW(), NOW()),
('Business', 'post', 'business', 'Business Insights', 'Grow your business', NOW(), NOW()),
('Entertainment', 'post', 'entertainment', 'Entertainment News', 'Fun and entertainment', NOW(), NOW()),
('Sports', 'post', 'sports', 'Sports Updates', 'Stay updated with sports', NOW(), NOW());

-- laravelweb_roles
INSERT INTO laravelweb_roles (name, guard_name, created_at, updated_at) VALUES
('admin', 'web', NOW(), NOW()),
('editor', 'web', NOW(), NOW()),
('writer', 'web', NOW(), NOW()),
('moderator', 'web', NOW(), NOW()),
('subscriber', 'web', NOW(), NOW()),
('contributor', 'web', NOW(), NOW()),
('manager', 'web', NOW(), NOW()),
('support', 'web', NOW(), NOW()),
('analyst', 'web', NOW(), NOW()),
('guest', 'web', NOW(), NOW());

-- laravelweb_permissions
INSERT INTO laravelweb_permissions (name, guard_name, created_at, updated_at) VALUES
('create-post', 'web', NOW(), NOW()),
('edit-post', 'web', NOW(), NOW()),
('delete-post', 'web', NOW(), NOW()),
('create-page', 'web', NOW(), NOW()),
('edit-page', 'web', NOW(), NOW()),
('delete-page', 'web', NOW(), NOW()),
('manage-users', 'web', NOW(), NOW()),
('manage-products', 'web', NOW(), NOW()),
('view-reports', 'web', NOW(), NOW()),
('manage-settings', 'web', NOW(), NOW());

-- laravelweb_tags
INSERT INTO laravelweb_tags (name, meta_title, meta_description, created_at, updated_at) VALUES
('Tech', 'Tech News', 'Latest tech news', NOW(), NOW()),
('Gadgets', 'Gadgets Reviews', 'Best gadgets reviews', NOW(), NOW()),
('HealthTips', 'Health Tips', 'Stay healthy', NOW(), NOW()),
('TravelDestinations', 'Travel Destinations', 'Best travel spots', NOW(), NOW()),
('Recipes', 'Recipes', 'Tasty recipes', NOW(), NOW()),
('FashionTrends', 'Fashion Trends', 'Latest fashion trends', NOW(), NOW()),
('EducationTips', 'Education Tips', 'Learn better', NOW(), NOW()),
('BusinessIdeas', 'Business Ideas', 'Grow your business', NOW(), NOW()),
('Movies', 'Movies', 'Latest movies', NOW(), NOW()),
('SportsNews', 'Sports News', 'Sports updates', NOW(), NOW());

-- laravelweb_pages
INSERT INTO laravelweb_pages (title, slug, meta_title, meta_description, body, canonical_url, user_id, created_at, updated_at) VALUES
('About Us', 'about-us', 'About Us', 'Learn about our company', 'This is the about us page...', 'https://example.com/about-us', 1, NOW(), NOW()),
('Contact Us', 'contact-us', 'Contact Us', 'Get in touch with us', 'This is the contact us page...', 'https://example.com/contact-us', 2, NOW(), NOW()),
('Our Services', 'our-services', 'Our Services', 'What we offer', 'This is the services page...', 'https://example.com/our-services', 3, NOW(), NOW()),
('Privacy Policy', 'privacy-policy', 'Privacy Policy', 'Our privacy policy', 'This is the privacy policy page...', 'https://example.com/privacy-policy', 4, NOW(), NOW()),
('Terms of Use', 'terms-of-use', 'Terms of Use', 'Our terms of use', 'This is the terms of use page...', 'https://example.com/terms-of-use', 5, NOW(), NOW()),
('FAQ', 'faq', 'FAQ', 'Frequently Asked Questions', 'This is the FAQ page...', 'https://example.com/faq', 6, NOW(), NOW()),
('Careers', 'careers', 'Careers', 'Join our team', 'This is the careers page...', 'https://example.com/careers', 7, NOW(), NOW()),
('Our Team', 'our-team', 'Our Team', 'Meet our team', 'This is the team page...', 'https://example.com/our-team', 8, NOW(), NOW()),
('Support', 'support', 'Support', 'Get support', 'This is the support page...', 'https://example.com/support', 9, NOW(), NOW()),
('Blog', 'blog', 'Blog', 'Read our blog', 'This is the blog page...', 'https://example.com/blog', 10, NOW(), NOW()),
('Events', 'events', 'Events', 'Upcoming events', 'This is the events page...', 'https://example.com/events', 1, NOW(), NOW()),
('Portfolio', 'portfolio', 'Portfolio', 'Our portfolio', 'This is the portfolio page...', 'https://example.com/portfolio', 2, NOW(), NOW()),
('Testimonials', 'testimonials', 'Testimonials', 'What our clients say', 'This is the testimonials page...', 'https://example.com/testimonials', 3, NOW(), NOW()),
('Pricing', 'pricing', 'Pricing', 'Our pricing plans', 'This is the pricing page...', 'https://example.com/pricing', 4, NOW(), NOW()),
('Home', 'home', 'Home', 'Welcome to our site', 'This is the home page...', 'https://example.com/home', 5, NOW(), NOW());


-- laravelweb_posts
INSERT INTO laravelweb_posts (title, slug, meta_title, meta_description, body, canonical_url, user_id, created_at, updated_at) VALUES
('Tech Trends 2025', 'tech-trends-2025', 'Tech Trends 2025', 'Future tech trends', 'This post is about tech trends in 2025...', 'https://example.com/tech-trends-2025', 1, NOW(), NOW()),
('Healthy Living Tips', 'healthy-living-tips', 'Healthy Living Tips', 'Tips for a healthy life', 'This post shares health tips...', 'https://example.com/healthy-living-tips', 2, NOW(), NOW()),
('Best Travel Destinations', 'best-travel-destinations', 'Best Travel Destinations', 'Top travel spots', 'This post lists travel destinations...', 'https://example.com/best-travel-destinations', 3, NOW(), NOW()),
('Delicious Recipes for Dinner', 'delicious-recipes-dinner', 'Delicious Recipes', 'Tasty dinner recipes', 'This post shares dinner recipes...', 'https://example.com/delicious-recipes-dinner', 4, NOW(), NOW()),
('Fashion Trends 2025', 'fashion-trends-2025', 'Fashion Trends 2025', 'Latest fashion trends', 'This post is about fashion trends...', 'https://example.com/fashion-trends-2025', 5, NOW(), NOW()),
('How to Study Effectively', 'how-to-study-effectively', 'Study Tips', 'Effective study tips', 'This post shares study tips...', 'https://example.com/how-to-study-effectively', 6, NOW(), NOW()),
('Business Growth Strategies', 'business-growth-strategies', 'Business Growth', 'Grow your business', 'This post is about business strategies...', 'https://example.com/business-growth-strategies', 7, NOW(), NOW()),
('Latest Movies to Watch', 'latest-movies-watch', 'Latest Movies', 'Movies to watch', 'This post lists new movies...', 'https://example.com/latest-movies-watch', 8, NOW(), NOW()),
('Sports Updates 2025', 'sports-updates-2025', 'Sports Updates', 'Latest sports news', 'This post shares sports updates...', 'https://example.com/sports-updates-2025', 9, NOW(), NOW()),
('Gadget Reviews 2025', 'gadget-reviews-2025', 'Gadget Reviews', 'Best gadgets 2025', 'This post reviews gadgets...', 'https://example.com/gadget-reviews-2025', 10, NOW(), NOW()),
('Healthy Breakfast Ideas', 'healthy-breakfast-ideas', 'Healthy Breakfast', 'Breakfast ideas', 'This post shares breakfast ideas...', 'https://example.com/healthy-breakfast-ideas', 1, NOW(), NOW()),
('Travel Tips for Beginners', 'travel-tips-beginners', 'Travel Tips', 'Tips for travelers', 'This post shares travel tips...', 'https://example.com/travel-tips-beginners', 2, NOW(), NOW()),
('Easy Dessert Recipes', 'easy-dessert-recipes', 'Dessert Recipes', 'Easy desserts', 'This post shares dessert recipes...', 'https://example.com/easy-dessert-recipes', 3, NOW(), NOW()),
('Fashion Tips for Winter', 'fashion-tips-winter', 'Winter Fashion', 'Winter fashion tips', 'This post shares winter fashion tips...', 'https://example.com/fashion-tips-winter', 4, NOW(), NOW()),
('Business Tips for Startups', 'business-tips-startups', 'Business Tips', 'Tips for startups', 'This post shares startup tips...', 'https://example.com/business-tips-startups', 5, NOW(), NOW());

-- laravelweb_products
INSERT INTO laravelweb_products (name, slug, description, price, image, user_id, category_id, created_at, updated_at) VALUES
('Smartphone X', 'smartphone-x', 'Latest smartphone model', 699.99, 'smartphone-x.jpg', 1, 1, NOW(), NOW()),
('Fitness Tracker', 'fitness-tracker', 'Track your fitness', 49.99, 'fitness-tracker.jpg', 2, 3, NOW(), NOW()),
('Travel Backpack', 'travel-backpack', 'Perfect for travel', 89.99, 'travel-backpack.jpg', 3, 4, NOW(), NOW()),
('Kitchen Mixer', 'kitchen-mixer', 'For your kitchen', 129.99, 'kitchen-mixer.jpg', 4, 5, NOW(), NOW()),
('Winter Jacket', 'winter-jacket', 'Stay warm in winter', 99.99, 'winter-jacket.jpg', 5, 6, NOW(), NOW()),
('Study Desk', 'study-desk', 'Perfect for studying', 199.99, 'study-desk.jpg', 6, 7, NOW(), NOW()),
('Business Planner', 'business-planner', 'Plan your business', 29.99, 'business-planner.jpg', 7, 8, NOW(), NOW()),
('Movie Streaming Device', 'movie-streaming-device', 'Stream movies easily', 59.99, 'movie-streaming-device.jpg', 8, 9, NOW(), NOW()),
('Sports Shoes', 'sports-shoes', 'Best for sports', 79.99, 'sports-shoes.jpg', 9, 10, NOW(), NOW()),
('Tablet Pro', 'tablet-pro', 'High-performance tablet', 499.99, 'tablet-pro.jpg', 10, 1, NOW(), NOW()),
('Health Monitor', 'health-monitor', 'Monitor your health', 89.99, 'health-monitor.jpg', 1, 3, NOW(), NOW()),
('Travel Guide Book', 'travel-guide-book', 'Guide for travelers', 19.99, 'travel-guide-book.jpg', 2, 4, NOW(), NOW()),
('Cookware Set', 'cookware-set', 'Complete cookware set', 149.99, 'cookware-set.jpg', 3, 5, NOW(), NOW()),
('Fashion Scarf', 'fashion-scarf', 'Stylish scarf', 24.99, 'fashion-scarf.jpg', 4, 6, NOW(), NOW()),
('Study Lamp', 'study-lamp', 'Bright study lamp', 39.99, 'study-lamp.jpg', 5, 7, NOW(), NOW());

-- laravelweb_categories_posts
INSERT INTO laravelweb_categories_posts (post_id, category_id) VALUES
(1, 1), -- Tech Trends 2025 -> Technology
(2, 3), -- Healthy Living Tips -> Health
(3, 4), -- Best Travel Destinations -> Travel
(4, 5), -- Delicious Recipes for Dinner -> Food
(5, 6), -- Fashion Trends 2025 -> Fashion
(6, 7), -- How to Study Effectively -> Education
(7, 8), -- Business Growth Strategies -> Business
(8, 9), -- Latest Movies to Watch -> Entertainment
(9, 10), -- Sports Updates 2025 -> Sports
(10, 1), -- Gadget Reviews 2025 -> Technology
(11, 3), -- Healthy Breakfast Ideas -> Health
(12, 4), -- Travel Tips for Beginners -> Travel
(13, 5), -- Easy Dessert Recipes -> Food
(14, 6), -- Fashion Tips for Winter -> Fashion
(15, 8); -- Business Tips for Startups -> Business

-- laravelweb_tags_posts
INSERT INTO laravelweb_tags_posts (post_id, tag_id) VALUES
(1, 1), -- Tech Trends 2025 -> Tech
(2, 3), -- Healthy Living Tips -> HealthTips
(3, 4), -- Best Travel Destinations -> TravelDestinations
(4, 5), -- Delicious Recipes for Dinner -> Recipes
(5, 6), -- Fashion Trends 2025 -> FashionTrends
(6, 7), -- How to Study Effectively -> EducationTips
(7, 8), -- Business Growth Strategies -> BusinessIdeas
(8, 9), -- Latest Movies to Watch -> Movies
(9, 10), -- Sports Updates 2025 -> SportsNews
(10, 2), -- Gadget Reviews 2025 -> Gadgets
(11, 3), -- Healthy Breakfast Ideas -> HealthTips
(12, 4), -- Travel Tips for Beginners -> TravelDestinations
(13, 5), -- Easy Dessert Recipes -> Recipes
(14, 6), -- Fashion Tips for Winter -> FashionTrends
(15, 8); -- Business Tips for Startups -> BusinessIdeas

-- laravelweb_media
INSERT INTO laravelweb_media (model_type, model_id, collection_name, file_name, mime_type, disk, conversions_disk, size, manipulations, custom_properties, generated_conversions, responsive_images, order_column, alt_text, created_at, updated_at) VALUES
('App\\Models\\Product', 1, 'images', 'smartphone-x.jpg', 'image/jpeg', 'public', 'public', 102400, '{}', '{"color": "black"}', '{}', '{}', 1, 'Smartphone X Image', NOW(), NOW()),
('App\\Models\\Product', 2, 'images', 'fitness-tracker.jpg', 'image/jpeg', 'public', 'public', 51200, '{}', '{"color": "silver"}', '{}', '{}', 2, 'Fitness Tracker Image', NOW(), NOW()),
('App\\Models\\Product', 3, 'images', 'travel-backpack.jpg', 'image/jpeg', 'public', 'public', 76800, '{}', '{"color": "blue"}', '{}', '{}', 3, 'Travel Backpack Image', NOW(), NOW()),
('App\\Models\\Product', 4, 'images', 'kitchen-mixer.jpg', 'image/jpeg', 'public', 'public', 128000, '{}', '{"color": "white"}', '{}', '{}', 4, 'Kitchen Mixer Image', NOW(), NOW()),
('App\\Models\\Product', 5, 'images', 'winter-jacket.jpg', 'image/jpeg', 'public', 'public', 89600, '{}', '{"color": "black"}', '{}', '{}', 5, 'Winter Jacket Image', NOW(), NOW()),
('App\\Models\\Post', 1, 'images', 'tech-trends.jpg', 'image/jpeg', 'public', 'public', 64000, '{}', '{}', '{}', '{}', 1, 'Tech Trends Image', NOW(), NOW()),
('App\\Models\\Post', 2, 'images', 'healthy-living.jpg', 'image/jpeg', 'public', 'public', 48000, '{}', '{}', '{}', '{}', 2, 'Healthy Living Image', NOW(), NOW()),
('App\\Models\\Post', 3, 'images', 'travel-destinations.jpg', 'image/jpeg', 'public', 'public', 72000, '{}', '{}', '{}', '{}', 3, 'Travel Destinations Image', NOW(), NOW()),
('App\\Models\\Post', 4, 'images', 'dinner-recipes.jpg', 'image/jpeg', 'public', 'public', 56000, '{}', '{}', '{}', '{}', 4, 'Dinner Recipes Image', NOW(), NOW()),
('App\\Models\\Post', 5, 'images', 'fashion-trends.jpg', 'image/jpeg', 'public', 'public', 68000, '{}', '{}', '{}', '{}', 5, 'Fashion Trends Image', NOW(), NOW()),
('App\\Models\\Product', 6, 'images', 'study-desk.jpg', 'image/jpeg', 'public', 'public', 115200, '{}', '{"color": "brown"}', '{}', '{}', 6, 'Study Desk Image', NOW(), NOW()),
('App\\Models\\Product', 7, 'images', 'business-planner.jpg', 'image/jpeg', 'public', 'public', 38400, '{}', '{"color": "black"}', '{}', '{}', 7, 'Business Planner Image', NOW(), NOW()),
('App\\Models\\Product', 8, 'images', 'movie-streaming-device.jpg', 'image/jpeg', 'public', 'public', 57600, '{}', '{"color": "black"}', '{}', '{}', 8, 'Streaming Device Image', NOW(), NOW()),
('App\\Models\\Product', 9, 'images', 'sports-shoes.jpg', 'image/jpeg', 'public', 'public', 70400, '{}', '{"color": "white"}', '{}', '{}', 9, 'Sports Shoes Image', NOW(), NOW()),
('App\\Models\\Product', 10, 'images', 'tablet-pro.jpg', 'image/jpeg', 'public', 'public', 96000, '{}', '{"color": "silver"}', '{}', '{}', 10, 'Tablet Pro Image', NOW(), NOW());

-- laravelweb_model_has_roles
INSERT INTO laravelweb_model_has_roles (role_id, model_type, model_id) VALUES
(1, 'App\\Models\\User', 1), -- John Doe -> admin
(2, 'App\\Models\\User', 2), -- Jane Smith -> editor
(3, 'App\\Models\\User', 3), -- Alice Jones -> writer
(4, 'App\\Models\\User', 4), -- Bob Brown -> moderator
(5, 'App\\Models\\User', 5), -- Emma Wilson -> subscriber
(6, 'App\\Models\\User', 6), -- David Martin -> contributor
(7, 'App\\Models\\User', 7), -- Sarah Moore -> manager
(8, 'App\\Models\\User', 8), -- Mike Taylor -> support
(9, 'App\\Models\\User', 9), -- Lisa White -> analyst
(10, 'App\\Models\\User', 10); -- Chris Green -> guest

-- laravelweb_model_has_permissions
INSERT INTO laravelweb_model_has_permissions (permission_id, model_type, model_id) VALUES
(1, 'App\\Models\\User', 1), -- John Doe -> create-post
(2, 'App\\Models\\User', 2), -- Jane Smith -> edit-post
(3, 'App\\Models\\User', 3), -- Alice Jones -> delete-post
(4, 'App\\Models\\User', 4), -- Bob Brown -> create-page
(5, 'App\\Models\\User', 5), -- Emma Wilson -> edit-page
(6, 'App\\Models\\User', 6), -- David Martin -> delete-page
(7, 'App\\Models\\User', 7), -- Sarah Moore -> manage-users
(8, 'App\\Models\\User', 8), -- Mike Taylor -> manage-products
(9, 'App\\Models\\User', 9), -- Lisa White -> view-reports
(10, 'App\\Models\\User', 10); -- Chris Green -> manage-settings

-- laravelweb_role_has_permissions
INSERT INTO laravelweb_role_has_permissions (permission_id, role_id) VALUES
(1, 1), -- admin -> create-post
(2, 1), -- admin -> edit-post
(3, 1), -- admin -> delete-post
(4, 2), -- editor -> create-page
(5, 2), -- editor -> edit-page
(6, 3), -- writer -> delete-page
(7, 4), -- moderator -> manage-users
(8, 5), -- subscriber -> manage-products
(9, 6), -- contributor -> view-reports
(10, 7); -- manager -> manage-settings

-- laravelweb_page_meta
INSERT INTO laravelweb_page_meta (page_id, meta_key, meta_value, created_at, updated_at) VALUES
(1, 'keywords', 'about, company', NOW(), NOW()),
(2, 'keywords', 'contact, support', NOW(), NOW()),
(3, 'keywords', 'services, offerings', NOW(), NOW()),
(4, 'keywords', 'privacy, policy', NOW(), NOW()),
(5, 'keywords', 'terms, usage', NOW(), NOW()),
(6, 'keywords', 'faq, questions', NOW(), NOW()),
(7, 'keywords', 'careers, jobs', NOW(), NOW()),
(8, 'keywords', 'team, staff', NOW(), NOW()),
(9, 'keywords', 'support, help', NOW(), NOW()),
(10, 'keywords', 'blog, articles', NOW(), NOW()),
(11, 'keywords', 'events, schedule', NOW(), NOW()),
(12, 'keywords', 'portfolio, projects', NOW(), NOW()),
(13, 'keywords', 'testimonials, reviews', NOW(), NOW()),
(14, 'keywords', 'pricing, plans', NOW(), NOW()),
(15, 'keywords', 'home, welcome', NOW(), NOW());

-- laravelweb_post_meta
INSERT INTO laravelweb_post_meta (post_id, meta_key, meta_value, created_at, updated_at) VALUES
(1, 'keywords', 'tech, trends', NOW(), NOW()),
(2, 'keywords', 'health, tips', NOW(), NOW()),
(3, 'keywords', 'travel, destinations', NOW(), NOW()),
(4, 'keywords', 'recipes, dinner', NOW(), NOW()),
(5, 'keywords', 'fashion, trends', NOW(), NOW()),
(6, 'keywords', 'study, education', NOW(), NOW()),
(7, 'keywords', 'business, strategies', NOW(), NOW()),
(8, 'keywords', 'movies, entertainment', NOW(), NOW()),
(9, 'keywords', 'sports, updates', NOW(), NOW()),
(10, 'keywords', 'gadgets, reviews', NOW(), NOW()),
(11, 'keywords', 'breakfast, health', NOW(), NOW()),
(12, 'keywords', 'travel, beginners', NOW(), NOW()),
(13, 'keywords', 'desserts, recipes', NOW(), NOW()),
(14, 'keywords', 'winter, fashion', NOW(), NOW()),
(15, 'keywords', 'startups, business', NOW(), NOW());

-- laravelweb_product_meta
INSERT INTO laravelweb_product_meta (product_id, meta_key, meta_value, created_at, updated_at) VALUES
(1, 'color', 'black', NOW(), NOW()),
(2, 'color', 'silver', NOW(), NOW()),
(3, 'color', 'blue', NOW(), NOW()),
(4, 'color', 'white', NOW(), NOW()),
(5, 'color', 'black', NOW(), NOW()),
(6, 'color', 'brown', NOW(), NOW()),
(7, 'color', 'black', NOW(), NOW()),
(8, 'color', 'black', NOW(), NOW()),
(9, 'color', 'white', NOW(), NOW()),
(10, 'color', 'silver', NOW(), NOW()),
(11, 'color', 'black', NOW(), NOW()),
(12, 'color', 'green', NOW(), NOW()),
(13, 'color', 'silver', NOW(), NOW()),
(14, 'color', 'red', NOW(), NOW()),
(15, 'color', 'white', NOW(), NOW());

INSERT INTO laravelweb_user_profiles (user_id, bio, avatar, created_at, updated_at) VALUES
(1, 'I am a tech enthusiast and love coding.', 'john_doe_avatar.jpg', NOW(), NOW()),
(2, 'Passionate about writing and lifestyle blogging.', 'jane_smith_avatar.jpg', NOW(), NOW()),
(3, 'Health and fitness coach with a love for travel.', 'alice_jones_avatar.jpg', NOW(), NOW()),
(4, 'Business owner and entrepreneur.', 'bob_brown_avatar.jpg', NOW(), NOW()),
(5, 'Fashion lover and content creator.', 'emma_wilson_avatar.jpg', NOW(), NOW()),
(6, 'Educator and lifelong learner.', 'david_martin_avatar.jpg', NOW(), NOW()),
(7, 'Manager with a focus on business growth.', 'sarah_moore_avatar.jpg', NOW(), NOW()),
(8, 'Tech support specialist and movie buff.', 'mike_taylor_avatar.jpg', NOW(), NOW()),
(9, 'Data analyst with a passion for sports.', 'lisa_white_avatar.jpg', NOW(), NOW()),
(10, 'Avid reader and guest contributor.', 'chris_green_avatar.jpg', NOW(), NOW());

SET SQL_SAFE_UPDATES = 0;