@extends('home')

@section('content')

<div class="relative flex justify-center bg-cover bg-center" style="background-image: url('/images/cat.jpg'); height: 660px;">
    <div class="absolute inset-0 flex flex-col items-center justify-between text-white bg-black bg-opacity-40 p-4"> <!-- Reduced opacity for lighter background -->
        <div class="flex flex-col items-center mt-40">
            <h1 class="text-8xl font-bold mb-2 text-white ">Welcome</h1>
            <h2 class="text-7xl font-bold mb-4 text-white ">To Pet Adoption Platform</h2>
        </div>
        <p class="text-lg text-center text-white  mb-32">
            Join our community to help find loving homes for pets in need. Whether you are looking to adopt a pet or post a pet for adoption, we are here to help.
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <div class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <div class="w-full md:w-3/4 lg:w-1/2 text-center">
                    <h1 class=" text-white text-4xl font-bold mb-4 animate-fade-down">Who we are</h1>
                    <p class=" text-gray-200 mb-4 animate-fade-up">
                        PattesEnQuete is a dedicated platform connecting pet owners with potential adopters. We're committed to ensuring every pet finds their perfect forever home through a safe, transparent, and caring adoption process.
                    </p>
                    <div class="border-t-4 border-primary w-24 border-orange-500 mx-auto mt-4 "></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="relative flex justify-center bg-cover bg-center" style="background-image: url('/images/dog.jpg'); height: 660px;">
    <div class="absolute inset-0 flex flex-col items-center justify-between text-white bg-black bg-opacity-40 p-4"> <!-- Reduced opacity for lighter background -->
        <div class="container mx-auto px-4 flex flex-col mt-40">
            <div class="flex justify-center">
                <div class="w-full md:w-3/4 lg:w-1/2 text-center">
                    <h1 class="text-4xl font-bold mb-4 animate-fade-down">Our Services</h1>
                    <p class="mb-4 animate-fade-up">We have following services to help animals.</p>
                    <div class="border-t-4 border-primary w-24 border-orange-500 mx-auto mt-4"></div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
                <div class="text-center">
                    <div class="animate-zoom-in mb-4">
                        <i class="fas fa-home text-5xl"></i>
                    </div>
                    <div class="animate-fade-in">
                        <h5 class="text-xl font-bold mb-2">Pet Adoption</h5>
                        <p class="text-gray-300">
                            Find your perfect companion through our safe and reliable adoption process.
                            We carefully screen all pets and adopters to ensure the best matches.
                        </p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="animate-zoom-in mb-4">
                        <i class="fas fa-hand-holding-heart text-5xl"></i>
                    </div>
                    <div class="animate-fade-in">
                        <h5 class="text-xl font-bold mb-2">Foster Care</h5>
                        <p class="text-gray-300">
                            Provide temporary homes for pets in need. Our foster program helps animals
                            prepare for their forever homes while receiving love and care.
                        </p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="animate-zoom-in mb-4">
                        <i class="fas fa-search text-5xl"></i>
                    </div>
                    <div class="animate-fade-in">
                        <h5 class="text-xl font-bold mb-2">Lost Pet Support</h5>
                        <p class="text-gray-300">
                            Post lost or found pets on our platform. We help reunite lost pets with
                            their families through our community network.
                        </p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="animate-zoom-in mb-4">
                        <i class="fas fa-hands-helping text-5xl"></i>
                    </div>
                    <div class="animate-fade-in">
                        <h5 class="text-xl font-bold mb-2">Rescue Support</h5>
                        <p class="text-gray-300">
                            Partner with local rescue organizations to save more pets. We provide
                            resources and support to help rescue efforts succeed.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white p-6 rounded mb-20 text-center">
    <h2 class="text-4xl font-bold mt-20 mb-5">Join Us Today</h2>
    <p class="text-gray-700 mb-10">
        Become a part of our community and make a difference in the lives of pets.
        <br/> Register now to start posting pets for adoption or to find your new furry friend.
    </p>
    <a href="{{ route('register') }}" class="bg-orange-500 text-white px-6 py-3 rounded text-lg hover:bg-orange-400 transition-all">Register Now</a>
</div>

@endsection
