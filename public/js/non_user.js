//pelamar
const btn_kandidat = document.getElementById("btn_kandidat");
const btn_non_kandidat = document.getElementById("btn_non_kandidat");
const btn_calon_kandidat = document.getElementById("btn_calon_kandidat");

const table_kandidat = document.getElementById("table_kandidat");
const table_non_kandidat = document.getElementById("table_non_kandidat");
const table_calon_kandidat = document.getElementById("table_calon_kandidat");

if (btn_kandidat && table_kandidat) {
    btn_kandidat.addEventListener("click", () => {
        table_kandidat.classList.remove("hidden");
        btn_kandidat.classList.add("bg-gray-700", "text-white");

        table_non_kandidat.classList.add("hidden");
        btn_non_kandidat.classList.remove("bg-gray-700", "text-white");

        table_calon_kandidat.classList.add("hidden");
        btn_calon_kandidat.classList.remove("bg-gray-700", "text-white");
    });
}

if (btn_non_kandidat && table_non_kandidat) {
    btn_non_kandidat.addEventListener("click", () => {
        table_kandidat.classList.add("hidden");
        btn_kandidat.classList.remove("bg-gray-700", "text-white");

        table_non_kandidat.classList.remove("hidden");
        btn_non_kandidat.classList.add("bg-gray-700", "text-white");

        table_calon_kandidat.classList.add("hidden");
        btn_calon_kandidat.classList.remove("bg-gray-700", "text-white");
    });
}

if (btn_calon_kandidat && table_calon_kandidat) {
    btn_calon_kandidat.addEventListener("click", () => {
        table_kandidat.classList.add("hidden");
        btn_kandidat.classList.remove("bg-gray-700", "text-white");

        table_non_kandidat.classList.add("hidden");
        btn_non_kandidat.classList.remove("bg-gray-700", "text-white");

        table_calon_kandidat.classList.remove("hidden");
        btn_calon_kandidat.classList.add("bg-gray-700", "text-white");
    });




    //PROFILE
    //ORGANISASI
    $("#formOrganisasi").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('organisasi.store', $pelamar->id) }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(res) {
                // append data yang baru ditambahkan
                $("#listOrganisasi").append(`
                <div class="border p-2 mb-2 rounded">
                    <b>${res.nama_organisasi}</b> - ${res.jabatan} (${res.tahun_awal} - ${res.tahun_akhir ?? '-'})
                    <br>
                    <small>${res.deskripsi ?? ''}</small>
                </div>
            `);

                // reset form & tutup modal
                $("#formOrganisasi")[0].reset();
                $("#crud-modal").modal('hide'); // kalau modal pakai bootstrap
            },
            error: function(err) {
                console.error(err.responseText);
                alert("Gagal menambahkan data");
            }
        });
    });


    //PENGALAMAN KERJA
    document.getElementById('crud-modalkerja').classList.add('hidden');

    $("#formkerja").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('kerja.store', $pelamar->id) }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(res) {
                // append data yang baru ditambahkan
                $("#listKerja").append(`
                <div class="border p-2 mb-2 rounded">
                    <b>${res.nama_perusahaan}</b> - ${res.posisi_pekerjaan} (${res.tahun_awal} - ${res.tahun_akhir ?? '-'})
                    <br>
                    <small>${res.deskripsi ?? ''}</small>
                </div>
            `);

                // reset form & tutup modal
                $("#formKerja")[0].reset();
                $("#crud-modalkerja").modal('hide'); // kalau modal pakai bootstrap
            },
            error: function(err) {
                console.error(err.responseText);
                alert("Gagal menambahkan data");
            }
        });
    });
}