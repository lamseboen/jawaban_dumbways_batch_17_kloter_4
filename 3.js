const cetakGambar = n => {
    // check tipe data dan genap tidaknya data
    if (typeof (n) !== 'number') return false
    if (n % 2 !== 0) return false

    // cetak gambar baris pertama karna pasti ++++++
    console.log("+".repeat(n))
    // looping setiap baris kecuali baris awal dan akhir (n-2)
    for (let i = 0; i < (n - 2); i++) {
        let temp = ''
        let path = 1
        // looping bentuk baris, setiap kelipatan 3 menggunakan tanda +
        for (let j = 0; j < n; j++) {
            if (path == 3) {
                temp += '+'
                path = 1
            } else {
                temp += '='
                path++
            }
        }
        console.log(temp)
    }
    // cetak gambar baris terakhir karna pasti ++++++
    console.log("+".repeat(n))
}

cetakGambar(8)