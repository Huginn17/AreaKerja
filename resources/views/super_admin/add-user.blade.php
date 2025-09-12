@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <main class="flex-1 p-6 bg-white overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-medium">Kelola Akun</h1>
            <div class="flex items-center gap-3">
                <!-- Icon -->
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- isi icon mu tetap -->
                </svg>

                <!-- User box -->
                <div class="flex items-center gap-2 bg-white px-3 py-2 border border-orange-600 shadow-md rounded-2xl">
                    <a href="#">
                        <img src="{{ asset('images/seven.png') }}" class="w-12 h-12 rounded-full" alt="User">
                    </a>
                    <div class="text-md">
                        <div class="font-semibold">Seven Inc</div>
                        <div class="text-gray-500">Seveninc@gmail.com</div>
                    </div>

                    <select class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-md focus:outline-none">
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 3</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah User -->
        <div class="flex justify-start mb-3">
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md flex items-center gap-2">
                <span>Tambah User</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto border border-orange-500 rounded-md shadow-md">
            <table class="min-w-full text-sm">
                <thead class="bg-orange-500 text-white text-center">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">User</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Username</th>
                        <th class="px-4 py-2">Region</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 10; $i++)
                        <tr class="text-center font-semibold">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">Admin</td>
                            <td class="px-4 py-2">useradmin5@gmail.com</td>
                            <td class="px-4 py-2">useradmin</td>
                            <td class="px-4 py-2">D.I Yogyakarta</td>
                            <td class="px-4 py-2 flex gap-2 justify-center">
                                
                                <button class="bg-orange-500 hover:bg-orange-600 text-white px-2 py-2 rounded-md">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <mask id="mask0_743_19486" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                            y="0" width="17" height="17">
                                            <rect x="0.65625" y="0.701172" width="15.686" height="15.686" rx="4.05389"
                                                fill="url(#pattern0_743_19486)" />
                                        </mask>
                                        <g mask="url(#mask0_743_19486)">
                                            <rect x="0.65625" y="0.701172" width="15.686" height="15.686" rx="4.05389"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <pattern id="pattern0_743_19486" patternContentUnits="objectBoundingBox"
                                                width="1" height="1">
                                                <use xlink:href="#image0_743_19486" transform="scale(0.0104167)" />
                                            </pattern>
                                            <image id="image0_743_19486" width="96" height="96"
                                                preserveAspectRatio="none"
                                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAABZ0lEQVR4nO3dMU7DQBBG4R+k3AVySkoKQHAb4BrcgCOQMkihcApEA3Fm8tbhfdK2q/W8xHLkIokkSZIkjeUmye7IdXvyU5+JiuEbYabK4RvhQB3DHzbCRcEeu4I9luyoGV5WnULzGABmAJgBYAaAGQBmAEmSJEk6sYr3AT+d+/uB0pn5SxhmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYB0BNg17juKjesOOAO8Ne46i/No6Arw27DmKZ/oAf7FO8pm+/wKj1jbJVeGcWj2FH1j1eiidULNVplsRPbSq9bK/pkVZJXnM9NWlBzh3bTN98hc3/O/WSe6TvGV6RKWH+tva7M96l+S6YR6SJEmS/rkvrDJThoEm4u8AAAAASUVORK5CYII=" />
                                        </defs>
                                    </svg>
                                </button>
                                

                                <button class="bg-orange-500 hover:bg-orange-600 text-white px-2 py-2 rounded-md">
                                    <svg width="17" height="11" viewBox="0 0 17 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.2961 0.273438C4.73111 0.273438 1.68661 2.49086 0.453125 5.62092C1.68661 8.75098 4.73111 10.9684 8.2961 10.9684C11.8611 10.9684 14.9056 8.75098 16.1391 5.62092C14.9056 2.49086 11.8611 0.273438 8.2961 0.273438ZM8.2961 9.18591C6.32823 9.18591 4.73111 7.5888 4.73111 5.62092C4.73111 3.65305 6.32823 2.05593 8.2961 2.05593C10.264 2.05593 11.8611 3.65305 11.8611 5.62092C11.8611 7.5888 10.264 9.18591 8.2961 9.18591ZM8.2961 3.48193C7.11253 3.48193 6.15711 4.43735 6.15711 5.62092C6.15711 6.8045 7.11253 7.75992 8.2961 7.75992C9.47968 7.75992 10.4351 6.8045 10.4351 5.62092C10.4351 4.43735 9.47968 3.48193 8.2961 3.48193Z"
                                            fill="white" />
                                    </svg>

                                </button>
                                
                                <a href="/super_admin/add/edit"
                                  class="bg-orange-500 hover:bg-orange-600 text-white px-2.5 py-2 rounded-md">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.9487 2.27529C11.1842 1.51081 10.3503 1.677 10.0406 1.77414L10.0367 1.77537C10.0349 1.77592 10.0332 1.77668 10.0316 1.77763V1.77763V1.77763C10.0305 1.77835 10.0293 1.77921 10.0283 1.78019C10.0273 1.7812 10.0261 1.78237 10.0247 1.78374L10.0021 1.80625V1.80625C9.6825 2.12585 9.5227 2.28565 9.44814 2.46357C9.34658 2.70596 9.34658 2.97897 9.44814 3.22135C9.5227 3.39928 9.6825 3.55908 10.0021 3.87868L10.3453 4.22187C10.6649 4.54147 10.8247 4.70127 11.0026 4.77583C11.245 4.87739 11.518 4.87739 11.7604 4.77583C11.9383 4.70127 12.0981 4.54147 12.4177 4.22187V4.22187L12.4402 4.19926C12.4416 4.19787 12.4428 4.19667 12.4438 4.19563C12.4448 4.19463 12.4456 4.19352 12.4463 4.19232V4.19232V4.19232C12.4473 4.19075 12.448 4.18906 12.4486 4.18731L12.4498 4.18339C12.547 3.87369 12.7132 3.03977 11.9487 2.27529ZM9.46714 7.17246C9.85538 6.78422 10.0495 6.59009 10.1222 6.36625C10.1862 6.16935 10.1862 5.95724 10.1222 5.76034C10.0495 5.5365 9.85538 5.34237 9.46714 4.95413L9.26984 4.75684C8.8816 4.36859 8.68748 4.17447 8.46363 4.10174C8.26673 4.03776 8.05463 4.03776 7.85773 4.10174C7.63388 4.17447 7.43976 4.36859 7.05151 4.75684L2.14298 9.66537C2.0987 9.70965 2.07685 9.73164 2.06154 9.7482V9.7482C2.06081 9.74898 2.06033 9.74996 2.06017 9.75102V9.75102C2.05661 9.77329 2.05281 9.80405 2.04535 9.86623L1.78183 12.0623C1.75703 12.2689 1.7434 12.3869 1.74073 12.4721V12.4721C1.74054 12.4783 1.74565 12.4834 1.7519 12.4832V12.4832C1.8371 12.4806 1.95503 12.4669 2.16172 12.4421L4.35774 12.1786C4.41992 12.1712 4.45068 12.1674 4.47295 12.1638V12.1638C4.474 12.1636 4.47499 12.1632 4.47577 12.1624V12.1624C4.49233 12.1471 4.51432 12.1253 4.5586 12.081L9.46714 7.17246ZM9.69977 0.687599C10.186 0.535085 11.5517 0.26785 12.7539 1.47008C13.9561 2.67232 13.6889 4.03796 13.5364 4.5242C13.5225 4.56832 13.508 4.61383 13.4731 4.68632C13.4454 4.74379 13.3978 4.82249 13.3596 4.8736C13.31 4.9402 13.2648 4.98532 13.2291 5.02091C13.227 5.023 13.225 5.02505 13.2229 5.02708L5.36381 12.8862C5.35823 12.8918 5.35251 12.8975 5.34665 12.9034C5.28248 12.9679 5.20166 13.0491 5.10444 13.1135C5.02005 13.1695 4.92857 13.214 4.83242 13.2457C4.72165 13.2824 4.60788 13.2958 4.51756 13.3064C4.50931 13.3074 4.50125 13.3083 4.49342 13.3092L2.27658 13.5753C2.09824 13.5967 1.92931 13.617 1.78755 13.6214C1.63595 13.6262 1.44962 13.6166 1.26209 13.5321C1.00883 13.4179 0.806032 13.2151 0.691877 12.9619C0.607349 12.7743 0.597808 12.588 0.602557 12.4364C0.606997 12.2947 0.627287 12.1257 0.648706 11.9474L0.914729 9.73056C0.91567 9.72272 0.916617 9.71467 0.917588 9.70642C0.928221 9.61609 0.941613 9.50232 0.978223 9.39155C1.01 9.2954 1.05447 9.20392 1.11044 9.11953C1.17491 9.02231 1.2561 8.94149 1.32056 8.87733C1.32644 8.87147 1.33219 8.86574 1.33777 8.86016L9.19689 1.00104C9.19892 0.999016 9.20097 0.99696 9.20306 0.994871C9.23865 0.959218 9.28377 0.914016 9.35037 0.864329C9.40148 0.826197 9.48018 0.778522 9.53765 0.750877C9.61014 0.716006 9.65565 0.701439 9.69977 0.687599Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endfor
                    <!-- Tambah baris lain sesuai data -->
                </tbody>
            </table>
        </div>
    </main>
@endsection
