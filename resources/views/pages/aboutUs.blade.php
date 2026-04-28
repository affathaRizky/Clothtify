@extends('layouts.main')

@section('title', 'About Us - CLOTHIFY')

@section('content')
<div class="max-w-screen-xl mx-auto px-4 py-12">

    <!-- ABOUT SECTION -->
    <section class="mb-16">
        <h1 class="text-4xl font-extrabold mb-6 text-gray-900">About Clothify</h1>

        <div class="bg-white shadow-md rounded-xl p-6 md:p-10">
            <p class="text-gray-700 text-lg leading-relaxed mb-4">
                Clothify is a fashion brand established on January 24, 2025, focusing on delivering modern,
                comfortable, and high-quality clothing. We specialize in T-shirts and pants designed to fit
                everyday lifestyles.
            </p>

            <p class="text-gray-700 text-lg leading-relaxed mb-4">
                Our journey began with a simple idea: to make stylish fashion accessible for everyone.
                We believe that what you wear is a reflection of who you are, and Clothify is here to help
                you express that identity with confidence.
            </p>

            <p class="text-gray-700 text-lg leading-relaxed">
                By combining trend-driven designs with premium materials, we ensure that every product
                not only looks good but also feels comfortable to wear. Clothify continues to grow
                as a trusted brand, committed to quality, innovation, and customer satisfaction.
            </p>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section>
        <h2 class="text-3xl font-bold mb-6 text-gray-900">Contact Us</h2>

        <div class="grid md:grid-cols-2 gap-8">

            <!-- Contact Info -->
            <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-xl font-semibold mb-4">Get in Touch</h3>

                <ul class="space-y-4 text-gray-700">
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-location-dot text-brand"></i>
                        <span>Batam, Indonesia</span>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-brand"></i>
                        <span>support@clothify.com</span>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-brand"></i>
                        <span>+62 812-3456-7890</span>
                    </li>
                </ul>
            </div>

            <!-- Contact Form (Flowbite Style) -->
            <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-xl font-semibold mb-4">Send Message</h3>

                <form>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Your Name</label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand focus:border-brand block w-full p-2.5"
                            placeholder="John Doe" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand focus:border-brand block w-full p-2.5"
                            placeholder="name@email.com" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Message</label>
                        <textarea rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand focus:border-brand block w-full p-2.5"
                            placeholder="Your message..."></textarea>
                    </div>

                    <button type="submit"
                        class="text-white bg-brand hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium font-medium rounded-lg text-sm px-5 py-2.5">
                        Send Message
                    </button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection