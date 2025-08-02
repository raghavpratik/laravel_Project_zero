<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community - LittleFur</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

@extends('layouts.nav')


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: linear-gradient(135deg, #fef7ff 0%, #e8f5ff 100%);
            min-height: 100vh;
            overflow-x: hidden;
            color: #333; /* Added: Ensures default text is visible */
        }
        .floating-paws {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }
        .paw {
            position: absolute;
            width: 20px;
            height: 20px;
            background: #ff9eb5;
            border-radius: 50%;
            opacity: 0.3;
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }
        /* Hero Section */
        .hero {
            text-align: center;
            padding: 60px 0;
            background: linear-gradient(135deg, #ff9eb5 0%, #feca57 100%);
            border-radius: 0 0 50px 50px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: bubble 8s ease-in-out infinite;
        }
        @keyframes bubble {
            0%, 100% { transform: scale(1) translate(0, 0); }
            50% { transform: scale(1.2) translate(20px, -20px); }
        }
        .hero h1 {
            font-size: 3rem;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 20px;
            animation: bounce 2s ease-in-out infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .hero p {
            font-size: 1.2rem;
            color: white;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .cta-btn {
            background: white;
            color: #ff6b9d;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .cta-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        /* Categories Grid */
        .categories {
            margin-bottom: 50px;
        }
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #ff6b9d;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .category-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 3px solid transparent;
        }
        .category-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            border-color: #ff9eb5;
        }
        .category-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            display: block;
        }
        .category-title {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 10px;
        }
        .category-desc {
            color: #666;
            font-size: 0.9rem;
        }
        /* Trending Discussions */
        .trending {
            background: white;
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 50px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .discussion-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .discussion-item:hover {
            background: #fef7ff;
            border-color: #ff9eb5;
            transform: translateX(10px);
        }
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff9eb5, #feca57);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        .discussion-content {
            flex: 1;
        }
        .discussion-title {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 5px;
            cursor: pointer;
        }
        .discussion-title:hover {
            color: #ff6b9d;
        }
        .discussion-meta {
            font-size: 0.8rem;
            color: #666;
            display: flex;
            gap: 15px;
        }
        /* Post Form */
        .post-form {
            background: white;
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 50px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ff9eb5;
            box-shadow: 0 0 0 3px rgba(255, 158, 181, 0.1);
        }
        .post-btn {
            background: linear-gradient(135deg, #ff9eb5, #feca57);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .post-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 158, 181, 0.4);
        }
        /* Community Feed */
        .community-feed {
            display: grid;
            gap: 30px;
            margin-bottom: 50px;
        }
        .post-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .post-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .post-content {
            margin-bottom: 20px;
            line-height: 1.6;
            color: #333;
        }
        .post-actions {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .action-btn {
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            padding: 8px 12px;
            border-radius: 20px;
        }
        .action-btn:hover {
            background: #fef7ff;
            color: #ff6b9d;
            transform: scale(1.1);
        }
        /* Events Section */
        .events {
            margin-bottom: 50px;
        }
        .events-scroll {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding: 20px 0;
        }
        .event-card {
            min-width: 300px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .event-card:hover {
            transform: scale(1.05);
        }
        .event-date {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .event-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .join-btn {
            background: white;
            color: #667eea;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .join-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        /* Leaderboard */
        .leaderboard {
            background: white;
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 50px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .leaderboard-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #fef7ff 0%, #e8f5ff 100%);
        }
        .rank-badge {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff9eb5, #feca57);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        .user-stats {
            flex: 1;
        }
        .user-name {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .user-title {
            color: #ff6b9d;
            font-size: 0.9rem;
        }
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            .discussion-item {
                flex-direction: column;
                text-align: center;
            }
        }
        /* Sticky mobile nav */
        .mobile-nav {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
        .mobile-post-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff9eb5, #feca57);
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }
        .mobile-post-btn:hover {
            transform: scale(1.1);
        }
        @media (min-width: 769px) {
            .mobile-nav {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="floating-paws">
        <div class="paw" style="left: 10%; animation-delay: 0s;"></div>
        <div class="paw" style="left: 20%; animation-delay: 2s;"></div>
        <div class="paw" style="left: 30%; animation-delay: 4s;"></div>
        <div class="paw" style="left: 40%; animation-delay: 1s;"></div>
        <div class="paw" style="left: 50%; animation-delay: 3s;"></div>
        <div class="paw" style="left: 60%; animation-delay: 5s;"></div>
        <div class="paw" style="left: 70%; animation-delay: 2.5s;"></div>
        <div class="paw" style="left: 80%; animation-delay: 4.5s;"></div>
        <div class="paw" style="left: 90%; animation-delay: 1.5s;"></div>
    </div>
    <div class="container">
        <section class="hero" data-aos="fade-up">
            <h1>🌟 A Place for Every Pet Lover 🌟</h1>
            <p>Share your stories, get expert advice, and connect with fellow pet enthusiasts!</p>
            <div class="cta-buttons">
                <button class="cta-btn">❓ Ask a Question</button>
                <button class="cta-btn">💬 Join a Discussion</button>
            </div>
        </section>
        <section class="categories" data-aos="fade-up" data-aos-delay="200">
            <h2 class="section-title">🎯 Popular Categories</h2>
            <div class="categories-grid">
                <div class="category-card" data-aos="zoom-in" data-aos-delay="300">
                    <span class="category-icon">🏥</span>
                    <h3 class="category-title">Pet Health</h3>
                    <p class="category-desc">Expert advice on keeping your furry friends healthy and happy</p>
                </div>
                <div class="category-card" data-aos="zoom-in" data-aos-delay="400">
                    <span class="category-icon">🎓</span>
                    <h3 class="category-title">Training Tips</h3>
                    <p class="category-desc">Learn the best techniques for training your pets</p>
                </div>
                <div class="category-card" data-aos="zoom-in" data-aos-delay="500">
                    <span class="category-icon">🍲</span>
                    <h3 class="category-title">Food & Nutrition</h3>
                    <p class="category-desc">Discover the best nutrition for your pet's needs</p>
                </div>
                <div class="category-card" data-aos="zoom-in" data-aos-delay="600">
                    <span class="category-icon">📸</span>
                    <h3 class="category-title">Share Your Pet</h3>
                    <p class="category-desc">Show off your adorable companions and see others!</p>
                </div>
                <div class="category-card" data-aos="zoom-in" data-aos-delay="700">
                    <span class="category-icon">🛒</span>
                    <h3 class="category-title">Recommendations</h3>
                    <p class="category-desc">Get product recommendations from fellow pet owners</p>
                </div>
                <div class="category-card" data-aos="zoom-in" data-aos-delay="800">
                    <span class="category-icon">🎉</span>
                    <h3 class="category-title">Events & Meetups</h3>
                    <p class="category-desc">Join local pet events and community gatherings</p>
                </div>
            </div>
        </section>
        <section class="trending" data-aos="fade-up" data-aos-delay="300">
            <h2 class="section-title">🔥 Trending Discussions</h2>
            <div class="discussion-item" data-aos="slide-right" data-aos-delay="400">
                <div class="user-avatar">🐱</div>
                <div class="discussion-content">
                    <h3 class="discussion-title">Best indoor plants that are safe for cats?</h3>
                    <div class="discussion-meta">
                        <span>🏷️ Pet Health</span>
                        <span>💬 24 replies</span>
                        <span>⏰ 2 hours ago</span>
                    </div>
                </div>
            </div>
            <div class="discussion-item" data-aos="slide-right" data-aos-delay="500">
                <div class="user-avatar">🐶</div>
                <div class="discussion-content">
                    <h3 class="discussion-title">My rescue dog is afraid of water - training tips?</h3>
                    <div class="discussion-meta">
                        <span>🏷️ Training Tips</span>
                        <span>💬 18 replies</span>
                        <span>⏰ 4 hours ago</span>
                    </div>
                </div>
            </div>
            <div class="discussion-item" data-aos="slide-right" data-aos-delay="600">
                <div class="user-avatar">🐹</div>
                <div class="discussion-content">
                    <h3 class="discussion-title">Homemade treats for small pets - recipe sharing!</h3>
                    <div class="discussion-meta">
                        <span>🏷️ Food & Nutrition</span>
                        <span>💬 31 replies</span>
                        <span>⏰ 6 hours ago</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="post-form" data-aos="fade-up" data-aos-delay="400">
            <h2 class="section-title">💭 Share with the Community</h2>
            <form>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <option value="">Select a category...</option>
                        <option value="health">🏥 Pet Health</option>
                        <option value="training">🎓 Training Tips</option>
                        <option value="food">🍲 Food & Nutrition</option>
                        <option value="photos">📸 Share Your Pet</option>
                        <option value="recommendations">🛒 Recommendations</option>
                        <option value="events">🎉 Events & Meetups</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="What's on your mind?">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" rows="4" placeholder="Share your thoughts, ask questions, or tell us about your pet..."></textarea>
                </div>
                <button type="submit" class="post-btn">🚀 Post to Community</button>
            </form>
        </section>
        <section class="community-feed" data-aos="fade-up" data-aos-delay="500">
            <h2 class="section-title">📰 Community Feed</h2>
            <div class="post-card" data-aos="slide-up" data-aos-delay="600">
                <div class="post-header">
                    <div class="user-avatar">🐱</div>
                    <div>
                        <div class="user-name">Sarah Johnson</div>
                        <div class="discussion-meta">
                            <span>🏷️ Share Your Pet</span>
                            <span>⏰ 1 hour ago</span>
                        </div>
                    </div>
                </div>
                <div class="post-content">
                    <h3>Meet Luna, my newest rescue! 🌙</h3>
                    <p>This beautiful girl just joined our family last week. She's still a bit shy but already showing so much personality. Any tips for helping rescue cats adjust to their new home?</p>
                </div>
                <div class="post-actions">
                    <button class="action-btn">❤️ 15 Loves</button>
                    <button class="action-btn">💬 8 Comments</button>
                    <button class="action-btn">🔄 Share</button>
                </div>
            </div>
            <div class="post-card" data-aos="slide-up" data-aos-delay="700">
                <div class="post-header">
                    <div class="user-avatar">🐶</div>
                    <div>
                        <div class="user-name">Mike Chen</div>
                        <div class="discussion-meta">
                            <span>🏷️ Training Tips</span>
                            <span>⏰ 3 hours ago</span>
                        </div>
                    </div>
                </div>
                <div class="post-content">
                    <h3>Success Story: Teaching "Stay" Command! 🎉</h3>
                    <p>After 3 weeks of consistent training, Max finally mastered the "stay" command! For anyone struggling with this, the key was starting with just 5 seconds and gradually increasing. Patience and treats work wonders!</p>
                </div>
                <div class="post-actions">
                    <button class="action-btn">🐾 22 Paws</button>
                    <button class="action-btn">💬 12 Comments</button>
                    <button class="action-btn">🔄 Share</button>
                </div>
            </div>
            <div class="post-card" data-aos="slide-up" data-aos-delay="800">
                <div class="post-header">
                    <div class="user-avatar">🐹</div>
                    <div>
                        <div class="user-name">Emma Davis</div>
                        <div class="discussion-meta">
                            <span>🏷️ Food & Nutrition</span>
                            <span>⏰ 5 hours ago</span>
                        </div>
                    </div>
                </div>
                <div class="post-content">
                    <h3>Homemade Dog Treat Recipe! 🍪</h3>
                    <p>Just made these peanut butter oat treats for my pups and they went crazy for them! Super simple: 2 cups oats, 1 cup peanut butter, 1 egg, bake 15 mins at 350°F. Anyone want the full recipe?</p>
                </div>
                <div class="post-actions">
                    <button class="action-btn">😋 31 Yummy</button>
                    <button class="action-btn">💬 18 Comments</button>
                    <button class="action-btn">🔄 Share</button>
                </div>
            </div>
        </section>
        <section class="events" data-aos="fade-up" data-aos-delay="600">
            <h2 class="section-title">🎪 Upcoming Events</h2>
            <div class="events-scroll">
                <div class="event-card" data-aos="flip-left" data-aos-delay="700">
                    <div class="event-date">Dec 15, 2024</div>
                    <div class="event-title">Pet Adoption Fair</div>
                    <p>Central Park - 10 AM</p>
                    <button class="join-btn">Join Event</button>
                </div>
                <div class="event-card" data-aos="flip-left" data-aos-delay="800">
                    <div class="event-date">Dec 20, 2024</div>
                    <div class="event-title">Dog Training Workshop</div>
                    <p>Community Center - 2 PM</p>
                    <button class="join-btn">Join Event</button>
                </div>
                <div class="event-card" data-aos="flip-left" data-aos-delay="900">
                    <div class="event-date">Dec 25, 2024</div>
                    <div class="event-title">Holiday Pet Parade</div>
                    <p>Main Street - 11 AM</p>
                    <button class="join-btn">Join Event</button>
                </div>
            </div>
        </section>
        <section class="leaderboard" data-aos="fade-up" data-aos-delay="700">
            <h2 class="section-title">🏆 Top Contributors</h2>
            <div class="leaderboard-item" data-aos="slide-left" data-aos-delay="800">
                <div class="rank-badge">1</div>
                <div class="user-avatar">🐱</div>
                <div class="user-stats">
                    <div class="user-name">Dr. Sarah Wilson</div>
                    <div class="user-title">🏥 Pet Health Expert</div>
                </div>
                <div>⭐ 247 helpful answers</div>
            </div>
            <div class="leaderboard-item" data-aos="slide-left" data-aos-delay="900">
                <div class="rank-badge">2</div>
                <div class="user-avatar">🐶</div>
                <div class="user-stats">
                    <div class="user-name">Jake Martinez</div>
                    <div class="user-title">🎓 Training Specialist</div>
                </div>
                <div>⭐ 189 helpful answers</div>
            </div>
            <div class="leaderboard-item" data-aos="slide-left" data-aos-delay="1000">
                <div class="rank-badge">3</div>
                <div class="user-avatar">🐹</div>
                <div class="user-stats">
                    <div class="user-name">Lisa Thompson</div>
                    <div class="user-title">🍲 Nutrition Guru</div>
                </div>
                <div>⭐ 156 helpful answers</div>
            </div>
        </section>
    </div>
    <div class="mobile-nav">
        <button class="mobile-post-btn">+</button>
    </div>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // GSAP Animations
        gsap.registerPlugin();

        // Animate category cards on hover
        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                gsap.to(card, {
                    duration: 0.3,
                    scale: 1.05,
                    y: -10,
                    boxShadow: '0 20px 40px rgba(0,0,0,0.2)',
                    ease: "power2.out"
                });
            });
            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    duration: 0.3,
                    scale: 1,
                    y: 0,
                    boxShadow: '0 10px 30px rgba(0,0,0,0.1)',
                    ease: "power2.out"
                });
            });
        });

        // CTA button animations (added for consistency)
        document.querySelectorAll('.cta-btn').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                gsap.to(btn, {
                    duration: 0.2,
                    y: -3,
                    scale: 1.05,
                    boxShadow: '0 8px 25px rgba(0,0,0,0.3)',
                    ease: "back.out(1.7)"
                });
            });
            btn.addEventListener('mouseleave', () => {
                gsap.to(btn, {
                    duration: 0.2,
                    y: 0,
                    scale: 1,
                    boxShadow: '0 4px 15px rgba(0,0,0,0.2)',
                    ease: "power2.out"
                });
            });
        });
    </script>
</body>

{{-- <body>
@extends('layouts.nav')

</body> --}}

<body>
    {{-- This is where you include the nav.blade.php layout --}}
    {{-- @include('layouts.nav')Assuming nav.blade.php is in a 'layouts' directory --}}
    {{-- @yield('content') --}}
</body>

</html>