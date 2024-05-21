<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Document')</title>
    <link href="{{ asset('css/isi.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.5.0/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>


<body class="bg-gray-100">
    
@include('layouts.navigation')

    <!-- Main Content -->
    <div class="container mx-auto mt-6">
        <!-- Card Section -->
        <div class="relative flex w-full md:w-100 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mb-6 mx-4">
            <div class="relative mx-4 -mt-6 h-80 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                <img src="{{ asset('assets/img/coba.jpg') }}" class="object-cover w-full h-full" />
            </div>
            <div class="p-6">
                <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                    Rumah Makan Sederhana
                </h5>
                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                    Banyak orang yang terjebak di nama ini, katanya aja sederhanaya tapi harganya selangit. bjir, sama 
                    kejadiannya kayak kami keerja kelompok kemaren. Kemaren itu ada yang nawarin cok ke champion, harganya
                    ga ngotak anjir.
                </p>
            </div>

            <div class="p-6 pt-0 flex items-center space-x-4">
                <button data-ripple-light="true" type="button" class="select-none rounded-lg bg-green-600 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Gerebek Lokasi
                </button>

                <!-- Rating Feature -->
                <div class="flex items-center space-x-2" x-data="{ rating: 0, totalRatings: 0 }">
                    <div class="flex items-center space-x-1">
                        <template x-for="star in [1, 2, 3, 4, 5]" :key="star">
                            <svg
                                x-bind:class="{'text-yellow-400': rating >= star, 'text-gray-300': rating < star }"
                                @click="rating = star; totalRatings += 1"
                                class="w-6 h-6 cursor-pointer transform hover:scale-110 transition-transform"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.682a1 1 0 00.95.69h4.882c.969 0 1.371 1.24.588 1.81l-3.95 2.874a1 1 0 00-.364 1.118l1.519 4.682c.3.921-.755 1.688-1.539 1.118L10 15.27l-3.95 2.874c-.784.57-1.839-.197-1.539-1.118l1.519-4.682a1 1 0 00-.364-1.118L2.717 10.11c-.783-.57-.38-1.81.588-1.81h4.882a1 1 0 00.95-.69l1.519-4.682z" />
                            </svg>
                        </template>
                    </div>
                    <span class="text-gray-600" x-text="totalRatings + ' ratings'"></span>
                </div>

            </div>
        </div>

        <div class="w-60 h-50 bg-white p-3 flex flex-col gap-1 rounded-br-3xl mx-4 mt-6 transition duration-300 transform hover:scale-105">
            <img src="{{ asset('assets/img/coba.jpg') }}" alt="Menu Image" class="hover:contrast-100" />
            <div class="flex flex-col gap-4">
                <div class="flex flex-row justify-between">
                    <div class="flex flex-col">
                        <span class="text-xl text-black font-bold">TST</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="relative flex w-full md:w-100 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mt-6 p-6 mx-4" x-data="{ comments: [], newComment: '', user: 'Guest' }">
            <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                Comments
            </h5>
            <form @submit.prevent="if (newComment) { comments.push({ user: user, comment: newComment, replies: [], likes: 0 }); newComment = ''; }" class="mb-4">
                <div class="flex items-center space-x-3">
                    <input type="text" x-model="newComment" placeholder="Add a comment" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <button type="submit" class="select-none rounded-lg bg-green-600 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Kirim
                    </button>
                </div>
            </form>
            <div class="space-y-4">
                <template x-for="(comment, index) in comments" :key="index">
                    <div class="p-4 border rounded-lg">
                        <p class="font-bold" x-text="comment.user"></p>
                        <p x-text="comment.comment"></p>
                        <div class="flex items-center space-x-2">
                            <button @click="comment.liked = !comment.liked; comment.likes += comment.liked ? 1 : -1" :class="{'text-red-600': comment.liked, 'text-gray-600': !comment.liked}" class="flex items-center">
                                <i class="fas fa-thumbs-up"></i> <span x-text="comment.likes"></span>
                            </button>
                            <template x-for="(reply, rIndex) in comment.replies" :key="rIndex">
                                <div class="ml-8">
                                    <p class="font-bold" x-text="reply.user"></p>
                                    <p x-text="reply.comment"></p>
                                    <button @click="reply.likes++" class="text-gray-600">
                                        <i class="fas fa-thumbs-up"></i> <span x-text="reply.likes"></span>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </div>
</body>
</html>
