<style>
    .logo {
     width: 80px;
     height:75px;
 }
</style>

<footer class="bg-gray-900 text-white py-8">
    <div class="container mx-auto text-center">
        <!-- Footer content -->
        <div class="flex flex-wrap justify-between items-center mb-6">
            <div class="w-full sm:w-auto mb-4 sm:mb-0">
                <img class="logo opacity-100" src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <div class="w-full sm:w-auto mb-4 sm:mb-0">
                <a href="#" class="text-gray-400 hover:text-white px-4">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white px-4">Terms of Service</a>
                <a href="#" class="text-gray-400 hover:text-white px-4">FAQ</a>
            </div>
            <div class="w-full sm:w-auto">
                <a href="#" class="text-gray-400 hover:text-white mx-2"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-gray-400 hover:text-white mx-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-white mx-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-gray-400 hover:text-white mx-2"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-6 text-sm text-gray-400">
            @php
            $year = date('Y');
            echo "<p> &copy; $year u-bank-team. All rights reserved.</p>";
        @endphp
    </div>
    
</footer>
