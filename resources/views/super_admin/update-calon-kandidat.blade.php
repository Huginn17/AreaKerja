@extends('super_admin.sidebar.index')

@section('sidebarsuperadmin')
<div class="ml-[260px] p-6">

  <!-- Header -->
  <div class="flex justify-between items-center mb-8 px-10">
    <h5 class="font-semibold text-lg">Data Kandidat</h5>

    <div class="flex items-center space-x-4">
      <div class="relative cursor-pointer">
     <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_732_13871)">
<path d="M23.076 14.9416L22.6747 12.7368L21.1101 13.0041L21.5756 15.5619C21.6168 15.788 21.7387 15.9907 21.9146 16.1255L24.4524 18.0718L24.6985 19.424L7.4876 22.3639L7.24147 21.0117L8.93911 18.3419C9.05673 18.157 9.09972 17.9261 9.05861 17.7L8.43786 14.2896C8.21777 13.0919 8.29153 11.8654 8.65169 10.7337C9.01186 9.60207 9.64569 8.60544 10.4892 7.84449C11.3326 7.08353 12.3559 6.58519 13.4555 6.39979C14.5552 6.21439 15.6924 6.3485 16.7522 6.78858L16.4051 4.88131C15.595 4.64916 14.7612 4.55542 13.9346 4.60354L13.6165 2.85571L12.0518 3.12297L12.37 4.8708C10.4802 5.41421 8.87215 6.7053 7.85685 8.49441C6.84155 10.2835 6.49109 12.4436 6.87324 14.5569L7.42973 17.6143L5.7321 20.284C5.61447 20.4689 5.57149 20.6999 5.6126 20.926L6.07815 23.4838C6.11931 23.7099 6.24121 23.9127 6.41702 24.0475C6.59284 24.1823 6.80817 24.2382 7.01565 24.2027L12.4919 23.2673L12.647 24.1199C12.8528 25.2505 13.4623 26.2644 14.3414 26.9386C15.2205 27.6128 16.2971 27.892 17.3345 27.7147C18.3719 27.5375 19.2851 26.9185 19.8732 25.9937C20.4612 25.0689 20.676 23.9142 20.4702 22.7836L20.315 21.931L25.7912 20.9956C25.9987 20.9601 26.1813 20.8363 26.2989 20.6513C26.4165 20.4664 26.4595 20.2354 26.4183 20.0093L25.9528 17.4515C25.9116 17.2254 25.7896 17.0227 25.6138 16.8879L23.076 14.9416ZM18.9055 23.0508C19.029 23.7292 18.9002 24.422 18.5473 24.9769C18.1945 25.5318 17.6466 25.9032 17.0242 26.0095C16.4017 26.1159 15.7557 25.9484 15.2283 25.5439C14.7008 25.1394 14.3351 24.531 14.2117 23.8526L14.0565 23L18.7504 22.1982L18.9055 23.0508Z" fill="black"/>
<path d="M22.3629 11.0324C24.0912 10.7372 25.2143 8.97095 24.8714 7.08743C24.5286 5.20392 22.8497 3.91635 21.1214 4.21156C19.3932 4.50678 18.2701 6.27298 18.6129 8.15649C18.9558 10.04 20.6347 11.3276 22.3629 11.0324Z" fill="black"/>
<ellipse cx="21.3472" cy="5.12912" rx="6.35506" ry="6.15646" fill="#E46054"/>
</g>
<defs>
<clipPath id="clip0_732_13871">
<rect width="25.3967" height="27.7315" fill="white" transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.164062 4.27539)"/>
</clipPath>
</defs>
</svg>

<span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold rounded-full px-1.5">7</span>
      </div>

      <div class="flex items-center bg-white rounded-lg shadow p-2.5">
       <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<circle cx="15.5" cy="15" r="15" fill="url(#pattern0_733_8812)"/>
<defs>
<pattern id="pattern0_733_8812" patternContentUnits="objectBoundingBox" width="1" height="1">
<use xlink:href="#image0_733_8812" transform="translate(-0.251366) scale(0.00546448)"/>
</pattern>
<image id="image0_733_8812" width="275" height="183" preserveAspectRatio="none" xlink:href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8QEA8QEBAQDw8PEA8PEA8PDw8PEBAQFREWFhYSFRUZHSggGBolGxUVITIhJykrLi4uFx8zODMsNygtLisBCgoKDQ0ODw0PDisZFRkrNy0rNystLTc3KystKy0rKysrKysrKysrKysrKysrKy0rKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAAAQIDBAUGBwj/xAA5EAACAQIEAwcCBAQGAwAAAAAAAQIDEQQFITESQVEGEyIyYXGBkaEjUrHBQtHh8AcUM2KC8RVDcv/EABYBAQEBAAAAAAAAAAAAAAAAAAABAv/EABYRAQEBAAAAAAAAAAAAAAAAAAABEf/aAAwDAQACEQMRAD8A5kAG2QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIbE5JJt6Jamqq4t1JcKTtyS3kLVZlbGxjtr+hg18zlysjLWT1dHNcO2hbqZauS+pnVYH/AJSb9GunMv0M3kvMlJdVozIjlDb0XJv+ZSsllry+pNGbQxMZrwv3XNF056vTnSkm7xa2f97m2wOMVRdJLdfujUqMwEJklQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJBRVnwpt7JXA1+aYi77uP/AC/kdV2E7ORku/qavVQXL3ORwtDicXu5yXvqz3Ds/gVCnTiloopIxWmFPIlONrbbOxaj2Uhe7je74vTXdex21LDxstDIVDQDzTG9m1S4pQ8ut1a9r+hrVgd242+Pqj0vGYdO/wBPjozTYnAQUdutgPLs+wSaei/kchGTpTT3s+XNdD0bO6STkjhM0p2b97gbWnO6TWzLqZq8uqNJRfNXX7o2UWbiKgSQEAAAAAAAAAAAAAAAAAAAAAAAAAAgBIAAtYmF4SXp7F6xS1/X2CpybDJ1Ka2ipxf3/wCj2nLNo+p5j2eoXc5SStum/wAsdbHqOUR8MfZfoYVuKLLsqmhZgiZLQDGxGzNNmcuGCvz0sbycbo1uYUFLR20uwPNM/UpNuzV305I4vNqTbVvVHp2e4fwOVlfVLf4PO8YrS15O/tcDWYR+JP3XqbamzUyXDVa/3P6Gzos1ErIRJCJKiAGAAAAAAAAAAAAAAAAAAAAAAASQSAJCKkBFirAUJVMRCKfh4Jyato2rW+7FiuE5RjOUHwyjbVbtMlWNl2fpOOI7htuU5qVpN3UFdyT6a8j0fEZxTwsFKcZuCsnOEeKMf/q2qOJyTLazqyr1Kne11CFWE0t76uPreN18nc4lVZUVLDKE51IxlTcn+E+JaSk1/DbX1Mqy8v7R4StFOFand/wuUVL5XIzamKSTdzzLtH2WzFxpSjWi5tLve6cMPCjJO9owSXHFrS900+TMrIssxUJSVSpPu4yipSbS407Jt9Oeu+n0DvIYtP7M1ua5nTg3xVIwvzk7FntNVjh8LKcJWvBuEldp2WjbWy97HkmXQxeMqyUpzhNqSdVq/BPh8MOsVtdrUDvM2zjDd29eNrTordTzrNqkJyvB9dDNnlmNoqcuNpqT4YOcajtfRXSXHpzsjBxFDjtUUVF7TS0TfVLkBoMSpT4eWln8G2ytNQS3s2YVek1eX8KdjPwj8KLErPiSRAqNIggkhgAAAAAAAAAAAAAAAAAAAAAEhIEgSipIhIrSAWL2X272MX5Z+GSezTLdihtpprdO6Cu9yldzVjT5KC4Nb6Ju1/qdnhKVNeOLavHh4U2oJabR2T0+7PNsLj+9iqq88Eotf7tNP1O4yfEuUFfq9+m6MK2+Jjpa9jWTy2E1On4rTd5yu7vT9PQz5bL0KKN7vlpstl/V/sBre2MJLC1Gno4bfscD2aU++U+J+JJXSjqlpqlu9782eh9q5r/JTk48XCp6eqSaPJcix0qeJipyXBUTlFcoyWln03A9OxWEVWDUpxSas2opO3qcN2tw9KlShGPlV+BO3PeXzp9Dp8VjH3eije2j1kvo9H8nnPanMXVlvd8VpN9f5AaSsrx9HL9jKw8bJLoY0I3il0ldmZRRYlZUEVEwRLRpFDBLIAgAAAAAAAAAAAAAAAAAACSCQCKkiEVICpIrRSitICUimaLiIkgNl2XnHjlCWzszvMpdrertb5/tHmGFq93UjK7SvZ26HomVYlcEHZ3Vrpa3fuZrTqKlSy/v6ljE4mnCnZOSlq04tcba33NJ2jzKUKaa0ukm0uKV3+VczWzhi5U/9GpCSva7pvRpc7+rfuQU9qe1UZ4WcKN5TnBtRdotNrn8HkWT4ibrKVTlK1nsnbY7/H5RiOLvHTqaJ8UUoLjd7667a2+hxWY0KsG2qbTulZtNRt6rd8gO1rZlx0tLbaaq/PR/RnHV6blLvJbSb15X6MzMnws3Gcpy10e+6enCWswtCKhF7av31s/oBhUFv7mfQiYmFV0vXU2NGJqJV2KDRXYhoqLTRSy40UtAUkEsAQAwAAAAAAAAAAAAAASECUBKKkiEitATFFaISKkBUg0ESBYqRNtluZVFRlCKvKOj8TWnKTtq+hrZoqy2pKFaLi7S1snqpLmn6Eqx22X/AI06PeyUu78Wi8LlfSPw9bM6bF1pwg5RXFZXftrr6nG5RK83C+0b8LuuBWbdorTl6I6atilS80/C0oKPSS3vbmZVzGZZ/iunDxXfiXBZJ+3Tkcpm+MqV5+XVJXa09zu8dnF6cko8cVZNxSaWl/FfbmaCjOmn30orx8rWSjw3u/SyA5vN5/5fDU27qc5St4dU7Wa/r7GhxeJXBFyldy8K30S3/Uudo85jUlKP/rjOUowWy15X1W1zmMRinJuXXZdAOuy+rGcVKOz+3obWjE8+y3MZ0ZJrVc4vZnVYPtJQlZS4oN9VoalRvSlomnUjJJxaafNMllRaaKWi40UtAWmQVtFLAggkAQAAAAAAAAAABJCJAIqSIRUkBKRWiEipAVJFSIRUgJRJS3bV6L1NTjs/pwuofiS6ryr55hW1qyUU3JpJbtuyRz+Nz1QqUp0k5KlPily44tOLivr9jU43H1a1+OTavdRWkV8GO0ZtV6nhcRRx1OM6FRRnFLVP8SEr3tKPI6XIMNLEOSxVn3ekYRco8V1rKVn8fU8AjVnTfHCUoSjqpRk4yXyj6H7L5LOlQoVKlWdXFd1GUqzdl40pOHArJxWiu9Xa9yC/m2UzWGr0KNlTrQnGVNpbyjbiUnr00emnI8GzLOMXRcsNO9OpRtTk3dSslpb0af3PprD1FOOqs1pKL3T/AHXqcJ/if2WoYmMXJRp1LWp14pccXyhL80W+X6AfPtSrfXcttl3F4aVKc6cvNCTi+j9V6FkCpFyKKYIvwiBfw2JqQ8s5R9mzdYDtJOOlVca/MvMjQqJXYaO9wmMp1Y8UJJr7r4LzR5zTlODvCTi+qdja4TtDXhZTtUXrozWpjr2iho1eH7Q0Zea8H67GfTxlKflnF/JRW0QVlLQRBBIAgAAAAAAAEhAlASVJEJFaQEpFaIRaxOLhTV5NIDIMLHZrSpLV3l+VGhzHPpTvGnoupq731erJauMzMc2qVnvww/Kv3MBhxK4R0MqpovUvOOhRGmXEgMrIsknjcRDDxkocfE51JJtQglrKy1b2SXNtH0PklF0qNKjJzm6NOFNVKnCpVIxVlJ20vocd/hx2Sjh6dHGylN169PxQdlCnSmuJRS34k1Ftnc4qrGC4W/MrxatdMCxjcydCooSs07NW32vZnJdsMynVV1bhguJJ/mutfsV5rWnKtKTu7QSjfdytp9jnq1SclJNt/G9wPP8AOMCqnfzelaL7y/KpD+KPut16NnOHZZxSak5Ldc+XsclWhaUktr3XswIgjJjEsQMqmBKiS0VMgClRHASiq4FiUSjicdm7l6RajG7v0A2+WZzUhZT8UfujpqFaM4qUXdM4aBscpxzpSSfke/oWVHVkMRldXJNIghkgCALEgQSQiQCKkQVICpIqRCLWMrqnByfJAYubZmqKstZM5LEYqdR3k2/QjF4h1JOT+CiCM2tKoxLjZCBBUi7AtMiMgLtymVRFDkW6iA+lMuzKksLRldeKlBpLpwrQ0mKxalUur7W1e3Q4LsRn83SWFqNcUP8ASet500vJ7xX1S9Dr4YqDta3r1AuTqNya39TWY+nZoz01yMTFwevPnuByWcYa93tzscVm8OGS+h6RmVJyjs/f09Th+0WGsr28r1A0tIyoMwIzMilO4GYQymMioCCm5Ng+vJAW5smSsrddyaMeJ3KK8tQJpsrIwsL6lUtwOlyPFcdOz3jobVHM9n52nJdUdJBmoiWQVEMqIAAAIACoqQAFaOf7TYrTgQBKrm4ou0wDKriRUoAAGilIACWiEgAL1Cbi04txlFpxktHFrZo9B7PZhHE0+Py1YNRqpJqLk1pJe/TkABu6MHcuVLPwogAYuMwj4bPn03ObzfJuKMoyejT91puAB5riaLhKUHvF29yKUgAMyBciwAKpOyLVZ7R66sgAZCSjG5r78UgANivDEsskAZ2SP8X4OopMA1EXiiwBUQSAB//Z"/>
</defs>
</svg>

        <div class="ml-2 leading-tight">
          <div class="font-semibold text-sm">Steve Jobs</div>
          <div class="text-xs text-gray-500">stevejobs@gmail.com</div>
        </div>
       <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.75635 7.37629C7.55916 7.56376 7.29175 7.66907 7.01292 7.66907C6.73409 7.66907 6.46668 7.56376 6.26949 7.37629L0.321018 1.71929C0.220587 1.62704 0.140479 1.5167 0.08537 1.39469C0.0302606 1.27269 0.00125297 1.14147 3.97018e-05 1.00869C-0.00117356 0.87591 0.0254321 0.744231 0.0783037 0.621335C0.131175 0.498438 0.209254 0.386786 0.307985 0.292893C0.406715 0.199 0.52412 0.124747 0.653348 0.0744663C0.782577 0.0241854 0.921041 -0.00111606 1.06066 3.7757e-05C1.20028 0.00119157 1.33826 0.0287779 1.46655 0.0811869C1.59484 0.133596 1.71087 0.209778 1.80787 0.305288L7.01292 5.25529L12.218 0.305288C12.4163 0.12313 12.6819 0.0223355 12.9576 0.0246139C13.2333 0.0268924 13.4971 0.132061 13.692 0.317469C13.887 0.502877 13.9976 0.75369 14 1.01589C14.0024 1.27808 13.8964 1.53069 13.7048 1.71929L7.75635 7.37629Z" fill="#606060" fill-opacity="0.8"/>
</svg>

      </div>
    </div>
  </div>

<!-- Orange box -->
<div class="bg-[#f86908] rounded-xl py-10 margin-left shadow-lg px-10">
  

  <div class="flex items-center mb-10 px-2 max-w-[1700px] mx-auto w-full">
    <div class="w-28 h-28 bg-white rounded-full flex justify-center items-center">
      <img src="{{ asset('images/ohim.jpg') }}" alt="ohim" class="w-21 h-21" />
    </div>
    <input
      type="text"
      placeholder="Masukkan Nama"
      class="ml-10 rounded-md p-2 flex-grow max-w-[1200px] text-sm"
    />
  </div>

  <div class="flex justify-between text-white space-x-12 px-8 max-w-[1900px] mx-auto w-full">
    <div class="flex flex-col max-w-[900px]">
      <label for="divisi" class="mb-3 text-sm font-semibold">Divisi</label>
      <select id="divisi" class="rounded-md p-2 text-black text-sm">
        <option selected>Divisi</option>
        <option value="1">Programmer</option>
        <option value="2">UI/UX Designer</option>
      </select>
    </div>

    <div class="flex flex-col max-w-[800px]">
      <label for="mulai" class="mb-3 text-sm font-semibold">Mulai Pelatihan</label>
      <input id="mulai" type="date" class="rounded-md p-2 text-black text-sm" />
    </div>

    <div class="flex flex-col max-w-[800px]">
      <label for="selesai" class="mb-3 text-sm font-semibold">Selesai Pelatihan</label>
      <input id="selesai" type="date" class="rounded-md p-2 text-black text-sm" />
    </div>
  </div><br>
  <br>

</div>

<!-- Buttons outside orange box -->
<div class="flex flex-col items-center space-y-3 mt-6">
  <!-- Tombol Simpan -->
  <button class="bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg px-40 py-2 shadow-md">
    Simpan
  </button>

  <!-- Tombol Kembali -->
  <button class="bg-red-700 hover:bg-red-800 text-white font-bold rounded-lg px-40 py-2 shadow-md">
    Kembali
  </button>
</div>


@endsection
