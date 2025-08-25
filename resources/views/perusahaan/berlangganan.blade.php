@extends('layouts.index-perusahaan')
@section('content')
    <!-- Section Atas -->
    <div class="bg-white p-10 flex flex-wrap justify-between items-center overflow-hidden">
        <div class="max-w-lg">
            <div class="text-2xl text-blue-900 font-semibold mb-4">
                <p>Berlangganan Bersama Kami <br> Menjadi Yang Terdepan</p>
            </div>
            <div class="text-sm font-medium text-blue-900 mb-8">
                <p>Jangan lewatkan kesempatan untuk selalu mendapatkan <br> penawaran menarik dengan berlangganan.</p>
            </div>
            <div>
                <button class="bg-orange-500 text-white text-sm font-medium px-6 py-3 rounded-xl shadow">
                    Berlangganan
                </button>
            </div>
        </div>
        <div class="flex justify-center md:justify-end w-full md:w-1/2">
            <img src="{{ asset('images/brolbaru.png') }}" alt="berlangganan"
                class="w-[450px] md:w-[550px] lg:w-[650px] h-auto object-contain">
        </div>
    </div>

    <!-- Section Benefit -->
    <div class="bg-orange-500 py-16 px-6 text-white">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-xl md:text-2xl font-bold mb-12">
                Benefit Berlangganan Di AreaKerja
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4 mb-10">
                <!-- Item 1 -->
                <div class="flex flex-col items-center">
                    <div class="mb-4">
                        <!-- Icon Globe -->
                        <svg width="89" height="89" viewBox="0 0 89 89" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M25.081 83.9936C24.9484 83.9936 24.7715 84.0821 24.6388 84.0821C16.0603 79.837 9.07365 72.8061 4.78438 64.2276C4.78438 64.0949 4.87282 63.9181 4.87282 63.7854C10.2676 65.3773 15.8392 66.5712 21.3666 67.4998C22.3394 73.0715 23.4891 78.5989 25.081 83.9936ZM83.8528 64.2718C79.4751 73.0715 72.179 80.1908 63.2909 84.48C64.9712 78.8642 66.3862 73.2041 67.3148 67.4998C72.8865 66.5712 78.3696 65.3773 83.7644 63.7854C83.7202 63.9623 83.8528 64.1392 83.8528 64.2718ZM84.2066 25.6242C78.635 23.9439 73.0191 22.5731 67.3148 21.6002C66.3862 15.896 65.0154 10.2359 63.2909 4.70849C72.4443 9.08619 79.8289 16.4708 84.2066 25.6242ZM25.0854 5.19048C23.4935 10.5852 22.3438 16.0684 21.4152 21.64C15.711 22.5244 10.0509 23.9394 4.43505 25.6198C8.72432 16.7317 15.8436 9.43553 24.6432 5.05782C24.7759 5.05782 24.9528 5.19048 25.0854 5.19048ZM59.7622 20.6716C49.5033 19.5219 39.156 19.5219 28.8971 20.6716C30.0026 14.6136 31.4176 8.55556 33.4075 2.71862C33.4959 2.36487 33.4517 2.09955 33.4959 1.7458C36.9893 0.905631 40.571 0.375 44.3297 0.375C48.0441 0.375 51.6701 0.905631 55.1192 1.7458C55.1634 2.09955 55.1634 2.36487 55.2518 2.71862C57.2417 8.59978 58.6567 14.6136 59.7622 20.6716ZM20.3982 60.0356C14.2959 58.9301 8.28212 57.5151 2.44518 55.5253C2.09143 55.4368 1.82611 55.481 1.47236 55.4368C0.632193 51.9435 0.101562 48.3617 0.101562 44.6031C0.101562 40.8887 0.632193 37.2627 1.47236 33.8136C1.82611 33.7694 2.09143 33.7694 2.44518 33.6809C8.32634 31.7353 14.2959 30.2761 20.3982 29.1706C19.2927 39.4294 19.2927 49.7768 20.3982 60.0356ZM88.5401 44.6031C88.5401 48.3617 88.0094 51.9435 87.1693 55.4368C86.8155 55.481 86.5502 55.4368 86.1964 55.5253C80.3153 57.4709 74.3015 58.9301 68.2434 60.0356C69.3931 49.7768 69.3931 39.4294 68.2434 29.1706C74.3015 30.2761 80.3595 31.6911 86.1964 33.6809C86.5502 33.7694 86.8155 33.8136 87.1693 33.8136C88.0094 37.3069 88.5401 40.8887 88.5401 44.6031ZM59.7622 68.5169C58.6567 74.6191 57.2417 80.6329 55.2518 86.4699C55.1634 86.8236 55.1634 87.089 55.1192 87.4427C51.6701 88.2829 48.0441 88.8135 44.3297 88.8135C40.571 88.8135 36.9893 88.2829 33.4959 87.4427C33.4517 87.089 33.4959 86.8236 33.4075 86.4699C31.4846 80.5988 29.9775 74.5996 28.8971 68.5169C34.0266 69.0917 39.156 69.4897 44.3297 69.4897C49.5033 69.4897 54.677 69.0917 59.7622 68.5169ZM60.9605 61.234C49.9113 62.6293 38.7304 62.6293 27.6811 61.234C26.286 50.1847 26.286 39.0038 27.6811 27.9546C38.7304 26.5594 49.9113 26.5594 60.9605 27.9546C62.3558 39.0038 62.3558 50.1847 60.9605 61.234Z"
                                fill="white" />
                        </svg>

                    </div>
                    <p class="text-sm font-medium">
                        Di undang ke dalam event <br>
                        yang diadakan oleh AreaKerja
                    </p>
                </div>

                <!-- Item 2 -->
                <div class="flex flex-col items-center">
                    <div class="mb-4">
                        <!-- Icon Chat -->
                        <svg width="84" height="83" viewBox="0 0 84 83" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M62.4827 0.158203H21.1609C9.75608 0.158203 0.5 9.37296 0.5 20.7365V45.4469V49.5791C0.5 60.9425 9.75608 70.1573 21.1609 70.1573H27.3592C28.4748 70.1573 29.9624 70.9011 30.6649 71.8102L36.8632 80.0332C39.5904 83.6695 44.0532 83.6695 46.7804 80.0332L52.9787 71.8102C53.7638 70.7771 55.0034 70.1573 56.2844 70.1573H62.4827C73.8875 70.1573 83.1436 60.9425 83.1436 49.5791V20.7365C83.1436 9.37296 73.8875 0.158203 62.4827 0.158203ZM25.2931 41.48C22.9791 41.48 21.1609 39.6205 21.1609 37.3478C21.1609 35.0751 23.0204 33.2156 25.2931 33.2156C27.5658 33.2156 29.4253 35.0751 29.4253 37.3478C29.4253 39.6205 27.6071 41.48 25.2931 41.48ZM41.8218 41.48C39.5078 41.48 37.6896 39.6205 37.6896 37.3478C37.6896 35.0751 39.5491 33.2156 41.8218 33.2156C44.0945 33.2156 45.954 35.0751 45.954 37.3478C45.954 39.6205 44.1358 41.48 41.8218 41.48ZM58.3505 41.48C56.0365 41.48 54.2183 39.6205 54.2183 37.3478C54.2183 35.0751 56.0778 33.2156 58.3505 33.2156C60.6232 33.2156 62.4827 35.0751 62.4827 37.3478C62.4827 39.6205 60.6645 41.48 58.3505 41.48Z"
                                fill="white" />
                        </svg>

                    </div>
                    <p class="text-sm font-medium">
                        Konsultasi Lifetime <br>
                        dalam merekrut pekerja
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Harga & Ajak Berlangganan -->
    <div class="bg-white py-16 px-6">
        <div
            class="max-w-6xl mx-auto border-4 border-orange-500 rounded-2xl p-10 py-2 flex flex-col md:flex-row justify-between items-center gap-8">
            <!-- Text -->
            <div class="md:w-1/2">
                <h3 class="text-xl font-bold text-blue-900 mb-4">Berlangganan Bersama Kami</h3>
                <p class="text-sm text-blue-900 mb-4 font-medium">
                    Dan Anda akan mendapatkan benefit yang sangat <br> bermanfaat untuk perusahaan anda
                </p>
                <p class="text-sm font-medium text-blue-900 mb-6">
                    Hanya Dengan <span class="text-orange-500 font-bold">
                    <img src="{{ asset('images/coin.png') }}" alt="" class="inline w-4 h-4">
                    1.000</span> Per Tahun
                </p>
                <button class="bg-orange-500 text-white px-6 py-3 rounded-xl shadow text-sm font-medium">
                    Berlangganan
                </button>
            </div>
            <!-- Image -->
            <div class="md:w-1/2 flex justify-center">
                <img src="{{ asset('images/jempol.png') }}" alt="ilustrasi berlangganan"
                    class="w-[350px] md:w-[450px] lg:w-[300px] h-auto object-contain">
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
