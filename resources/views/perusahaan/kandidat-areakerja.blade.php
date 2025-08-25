@extends('layouts.index-perusahaan')
@section('content')
    <!-- Hero Section -->
    <section class="relative">
        <img src="{{ asset('images/ntap.png') }}" alt="hero" class="w-full h-[350px] object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="absolute bottom-20 left-20 text-white">
            <h1 class="text-3xl md:text-4xl font-semibold max-w-2xl mb-3">
                Kandidat Area Kerja
            </h1>
            <p class="text-sm mb-16">Rekrut karyawan terakreditasi <br> di Area Kerja</p>
        </div>
    </section>

    <!-- Filter -->
    <div class="bg-white border-2 shadow-md p-6 -mt-12 relative z-10 max-w-4xl mx-auto rounded-lg">
        <div class="flex items-center gap-4">
            <!-- Skill -->
            <div class="flex items-center gap-2 border-r pr-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="24" height="24" fill="url(#pattern0_661_9288)" fill-opacity="0.3" />
                    <defs>
                        <pattern id="pattern0_661_9288" patternContentUnits="objectBoundingBox" width="1"
                            height="1">
                            <use xlink:href="#image0_661_9288" transform="scale(0.0104167)" />
                        </pattern>
                        <image id="image0_661_9288" width="96" height="96" preserveAspectRatio="none"
                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAEIklEQVR4nO2cTYhWVRjHf6OjhGOJaS5Ey8LsQ9H8wIIWgbqRwChcBLVwYQoaooIIMooQiA4agbkoqCgF3RkpIZIuitCCQNMxA1skIgouzCbx+5EDJ5RBnefM3Pee59xzfvDfvTz3PP/nvOeej3svFAqFQqFQKBQKhYI9ngTeBNYC3yh+L8aVBFOBTcBvwO3ABGIbnGwBOoBlwMkBJhDb4OQK0AFsAC5VlEBsg5MpQBuwGDhfcQKxDU6iABOAH1qUQGyDzRdgIXClhQmIcUVjELAFuNPiBMS4ojAY+KqmBDYr47iO8EEFuc0Driuv2UUEhgDf1tiD2oDPlbFu+SGxv7wG9Civ9bVvW620VdjzJeAv7Ia7Pcp4rvfO70duLwdMnfcD7USgqwVj6LvKaw8FDihj9vjerGU8cFYZ+2dgGBF4q4IbrjxAN/zekAaX+I/KuJeBVxQxRwGnlDG7/V5W7UwE/mmB+eL1H/C6si0jgePKuG5R+Fwfq/Yjylh/A+OIQNsAFlkSINdjZyjb9BRwWhn3L2DsQyYT3ytjuHvDS0RiSQ3mi9cF4Hllu54Fzinjnug1dLhOtTPgfvIqkRgOXKyxAOJvhk8r2zcpoH2/+Hwc2wLuT/2ZUVXGxprNl/tudqOVbZwN/KuMexDoVP7WTTjeIyKP+3FZIulX3wYNc4FrFV9/JZFZEdF88ToMPKZs7wLgZkXXdad30fnTQAEE2Buw6lxUwVrlixhbDL2ZZcB4uU87/XaEhg8HcJ19sbYYerPFgOnSS9sD2v9RP+If8QszE/R1kB5L6wNy2BEQ93e/wjbB6Bbt+UhFWqXMw43jXyrXHW4zzgxvGzBZHqHbAfPzIYpVrlvMmWKDAZNFcfDyjjKfvjbYzLHLgMGi0FXgjaYVYLCh+b8o5FbqjSrAagOmSqAaU4BnAja1LKkxBdhnwEzJtQDvGzBSci3AqAiHLlIKcA/t0ZxVJf0PmGN820GaXAD3jM0ZAwZKrgXYasA8ybUA0yo8vout5ArQ7t9WjG2c5FqApQZMkxoLYI7vDJgmORfgmAHTJOcCpL7wktQL8II/zIhtnORaAMeUgBcdrCtppgOfBbyYZlGNYIR/D+APA4ZKjgX4n0EGDJWa5DYh12AQyUTdAU9e14pkoBvATIwiGWgdhpGG66iVR9AfhjRYN5Uvb0dFGqwuEkAaqsuxPjMQijRUnSSCNFDXgTEkgjRQu0kIaaAWkBApPiEtfUw9nyAhug2YJhXqJxLjEwOmSYVy+SR3WnbLgHFSkZaTICEvOVvXPBLEfaHwkAHzpAK9SKK4InzagOFoHIkzGfjYf3ctxSnqSDJDjMl9riArxJiyQ4wpO8SYskOMKTvEmLJDjCk7xJiyQ4wpO8SYskOMKTvEmAqFQqFQKBQKhUKBVnIXvexR+hsD3XMAAAAASUVORK5CYII=" />
                    </defs>
                </svg>

                <select class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-sm focus:outline-none">
                    <option>Skill</option>
                    <option>UI/UX</option>
                    <option>Frontend</option>
                    <option>Backend</option>
                </select>
            </div>

            <!-- Umur -->
            <div class="flex items-center gap-2 border-r pr-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect opacity="0.3" width="24" height="24" fill="url(#pattern0_661_9289)" />
                    <defs>
                        <pattern id="pattern0_661_9289" patternContentUnits="objectBoundingBox" width="1"
                            height="1">
                            <use xlink:href="#image0_661_9289" transform="scale(0.0104167)" />
                        </pattern>
                        <image id="image0_661_9289" width="96" height="96" preserveAspectRatio="none"
                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAACjklEQVR4nO2dS04cMRCG/83kLHkckCVeIiUQEKdJcoyQgwTYTaRCI3UkQJNMM9j1Fa76pFr7f7jdI43UloqiKIpiHHZgaKLrm96gBdc3vUELrm96gxZc3/QGLbi+6Q1acH3TG7Tg+qY3aMH1HeSTpK+SbiTdrzD01ud+8Xoh6SMZ/DtJ15L+BAjFoNl5v5K0IcL/ESAACzLfvUu4DmDags2l55mf+dixf8xW0gePAi4DmLWgc+5RwK8ARi3o/PQo4C6AUQs6tx4F0CYt+FQBqgLwXWj1BPBBWB1BfBgGTL0DVAXgu9DqCeCDsDqC+DAMmHoHqArAd6HVE8AHYVmPoNkx2j8uAAb3jwuAwf3jAmBw/7gAGNw/LgAG948LgMH94wJgcP+4gEc0SWfyBfePC3gU/t81PUvA/eMC9DR87xJw/7SA9p+1zxL4RwW0FeuPLiFtAW3F2h4lpCygvSD80SWkK6AdEf7IElIV0F4R/qgS0hTQOoQ/ooQUBbSO4fcuYfoC2oDwe5YwfQHRwf3jAmBw/7gAGNw/LgAG948LgMH94wJgcP+4ABjcPy4ABvc/WsDJijWOndM34D+EgJOg4acpoHcJvcJPVUCvEnqGn66A15bQO/yUBRxbwojw0xbw0hJGhZ+6gLUljAxf2Qs4VMLo8CP45wVofwke4YfwjwvYU4JX+CH84wKe/X+8G09w/7gAGNw/LgAG948LgMH94wJgcP+3K0Rknd8eBdwEMGqZP118EcCoBZ3PHgXsru2oz9dr7+fr38uJqwC7zYLN7mRwY7Nc20GbtiDzjbhHZrNc5rANEIBBs112vnv4z98J58svgAx3C9wtXr94XVlSFEVRFEVRFEVRFEVRaAoeAGng/CsPyJlSAAAAAElFTkSuQmCC" />
                    </defs>
                </svg>

                <select class="appearance-none px-12 py-2 bg-transparent text-gray-600 text-sm focus:outline-none">
                    <option>Umur</option>
                    <option>18-25</option>
                    <option>26-30</option>
                    <option>31+</option>
                </select>
            </div>

            <!-- Gender -->
            <div class="flex items-center gap-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="24" height="23.8689" fill="url(#pattern0_661_9290)" fill-opacity="0.3" />
                    <defs>
                        <pattern id="pattern0_661_9290" patternContentUnits="objectBoundingBox" width="1"
                            height="1">
                            <use xlink:href="#image0_661_9290" transform="matrix(0.0103597 0 0 0.0104167 0.00273224 0)" />
                        </pattern>
                        <image id="image0_661_9290" width="96" height="96" preserveAspectRatio="none"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>

                <select class="appearance-none px-12 py-2 bg-transparent text-gray-600 text-sm focus:outline-none">
                    <option>Gender</option>
                    <option>L</option>
                    <option>P</option>
                </select>
            </div>

            <!-- Button -->
            <button class="ml-auto bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md text-sm font-medium">
                Cari Kandidat
            </button>
        </div>
    </div>

    <!-- Koin -->
    <div class="max-w-6xl mx-auto mt-4 flex justify-end">
        <div class="flex items-center gap-6 bg-white  px-6 py-4 rounded-lg">
            <!-- Coin + jumlah + teks -->
            <div class="flex flex-col items-center">
                <span class="flex items-center">
                    <p class="text-yellow-500 font-semibold text-4xl">80</p>
                    <img src="{{ asset('images/coin.png') }}" alt="coin" class="w-10 h-10 ml-2">
                </span>
                <a href="#" class="flex items-center text-green-600 text-sm font-medium hover:text-green-500 mt-2">
                    <p class="mr-2">Top Up Koin</p>
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <mask id="mask0_2997_13201" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                            width="21" height="21">
                            <rect width="20.4918" height="20.4918" fill="url(#pattern0_2997_13201)" />
                        </mask>
                        <g mask="url(#mask0_2997_13201)">
                            <rect x="0.242188" y="0.246094" width="20" height="20" fill="#42BB72" />
                        </g>
                        <defs>
                            <pattern id="pattern0_2997_13201" patternContentUnits="objectBoundingBox" width="1"
                                height="1">
                                <use xlink:href="#image0_2997_13201" transform="scale(0.0104167)" />
                            </pattern>
                            <image id="image0_2997_13201" width="96" height="96" preserveAspectRatio="none"
                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAEhUlEQVR4nO2dz48URRTHP47ouCPIL1kJRBc9AAdNIF6JhkVMjEwg/uJEOHhBvUDgjyASJRIve9UbBxU5GvGCePRHlMCGRUPWFQPyQxDwsnCoISyrs/W6q6pf9fT7JN/Mpabn9fdNdXV3Vb8GwzAMwzAMwzCaxgPaAXgYBtYDa2ZoGHgUWNz7BPgHuNz7/BMYB04Bp4HvgQuVRl2A3BLQATYDo8BG4FnCY7wN/Awc6+kr4GbgNgeKFrABGAOu4gxLqRvAYaALPFjB/mXLI8C7wFnSm95PE8A7vVgaQwfYB0yhZ/xsTQF7e7ENNF3gV/QN76dJ4M1ke6/IKuAo+gZLdQQYSeKEAtuAS+ibWlRXge0J/KiMNvAR+kaGaqy3L7ViKfAd+ubF0rfAkqgOJWQF8BP6psXWSeCpiD4lYS1wDn2zUulcbx+zZCXwG/ompdYkGZ4hLcV1UW1zqtI47qZgFrQZrAFXqhNkcnb0MfpmaOlQBP+CeAN9E7T1erCLJVkFXBEEOOi6jNKg/GWJYAdVRwK9LMy2SIEPkrpBjhagg+75vg+tuM4CQ4L47qNV9AvAe2R4IZIBTwO7Uv9IG/gd3a7uQzO2PyjYC4r2gLdxN9uM/2c5sDPVxlvoTqDXoQfcxk30i5fSFOkBL+KOc8bcPAO8IG1cJAE7isfSWMReSbvKEG6AWVgqnLj4YpYcplLzN2488K7Ak/aAl8nD/LrwGLBJ0lCagNHysTSWjZJG0gSINmbch+hPKxkDhoHzwrZVUIcxAGAaeAK4OFcjSQ9YTz7m14kWsE7SyMea8Fgai9c7S0BaoiRgdYRAmoo3AfMEG1keIZCZpB5PYjzSFAuvd5IesCBCIE3F650lIC1REjA/QiBNJUoCjIRIEnA9eRSDyzVfA0kCvBsx+mIJUCZKAs5HCGQmuc8Jx8TrnSQB4xECaSqnfQ0kCfBuxOiLJUAZr3eS+ybLcDV4cpkTqNOEzDDw11yNJD3gAq7ejlGMH/GYD/Ir4WNhsTQSkWeWgHR8I2lkC7PSEH1h1k3gs5CIGsZhhHXpitwN/bRcLI0kiVct3NJr7eXfPrTjO0Oi5enTwAcF2jeVAyQch+wRpbk1RcEKjEVnxP4FPiz4nSbxPnAr9Y900K186EMrrglKPKZallcq2KG6aUuQoyWwUgX39Hmgl6UYwRWq0N55bV1CsZZcF3d6qm2ClqaB14JdDOQQ+kZo6WAE/4Jp4+pqaptRtY4DD0fwLwoLcRMQ2qZUpV/IsJBrk8pWZlvAtQmFW7N/YmgFg3k4Ogk8GdGnpCzB1dXUNi2WjpPhMd/HQ8B+6n+dMEZGZztl2Ep9X+DwVgI/VBihXveOviDjM50QuuRRdaufJoBXk+19JnSAPejPrM3UJLCbCu/n50Ab9xI1zYn+CVypySyqoGvyPO6FPxdJb/oV4BPgJTJYcKwewCyGcJWmRnt6jvAnOadx77S5+zLPr6lg3lZKbgmYzeO4cjmrcbc57r7OdgGwiHvPMF/H/bOv8d/X2f6Ap2aPYRiGYRiGYRhGldwBFK9RwjpRCLwAAAAASUVORK5CYII=" />
                        </defs>
                    </svg>

                </a>
            </div>
        </div>
    </div>


    <!-- Tabel Kandidat -->
    <div class="max-w-6xl mx-auto mt-6 mb-10 overflow-x-auto rounded-lg">
        <table class="w-full border-collapse text-sm">
            <thead>
                <tr class="bg-orange-500 text-white text-center">
                    <th class="py-3 px-4 font-medium">Nama</th>
                    <th class="py-3 px-4 font-medium">Skill</th>
                    <th class="py-3 px-4 font-medium">Umur</th>
                    <th class="py-3 px-4 font-medium">Pengalaman</th>
                    <th class="py-3 px-4 font-medium">Gender</th>
                    <th class="py-3 px-4 font-medium">CV</th>
                    <th class="py-3 px-4 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @for ($i = 0; $i < 10; $i++)
                    <tr class="hover:bg-gray-50 text-center">
                        <td class="py-3 px-4">Bambang Kurnia</td>
                        <td class="py-3 px-4">UI UX</td>
                        <td class="py-3 px-4">22 Tahun</td>
                        <td class="py-3 px-4">Expert</td>
                        <td class="py-3 px-4">P</td>
                        <td class="py-3 px-4">
                            <svg class="inline w-4 h-4" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0_661_9627" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="22" height="22">
                                    <rect x="0.210938" y="0.207031" width="21.5856" height="21.5856"
                                        fill="url(#pattern0_661_9627)" />
                                </mask>
                                <g mask="url(#mask0_661_9627)">
                                    <rect x="0.210938" y="0.207031" width="21.5856" height="21.5856" fill="#FA6601" />
                                </g>
                                <defs>
                                    <pattern id="pattern0_661_9627" patternContentUnits="objectBoundingBox"
                                        width="1" height="1">
                                        <use xlink:href="#image0_661_9627" transform="scale(0.0104167)" />
                                    </pattern>
                                    <image id="image0_661_9627" width="96" height="96" preserveAspectRatio="none"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAABgElEQVR4nO3dQU7CQABG4V+9hq49okvjdQzxDi48Dgu5AC7MJIYIbZm2b5i+L5klYfhfwq6QSJIkSVKbnpLskhySHAfOIclHkmfkph16SrLP8PCnZ5/kEbhvd3aZPn4578B9uzPma+fc+QbuO8kdfYERjpWvb/oz3tMX2DoDwAwAMwDMADADwAwAMwDMADADwAwAMwDMADADwAwAMwDMADADwAwAMwDMADADwAwAMwDMADADwAwAMwDMADADwAwAWyPAS65/wKL22YBUvvfrDO/fhNoIxOlm/OKWInQ3fnELEbodv2g5QvfjFy1G2Mz4RUsRNjd+0UKEzY5fkBE2P35BRHD8E2tGcPwz1ojg+AOWjOD4Iy0RwfEnmjOC419pjgiOX6kmguPP5JoIjj+zKREcfyFjIjj+wi5FcPyV/BfB8Vf2N8LNjv9AX6DCV35/kvIzyRt8F0mSJEmSJGnQmP9XOS5+i75d3NinJGEGgBkAZgCYAWAGgBlAkiRJklb2A7zHaRpUDTVNAAAAAElFTkSuQmCC" />
                                </defs>
                            </svg>

                        </td>
                        <td class="py-3 px-4">
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white px-10 py-2 rounded-md text-xs font-medium">
                                Beli
                            </button>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    @include('layouts.footer')
@endsection
