const generate = (n) => {
    //cek parameter harus number
    if (typeof (n) !== 'number') return [false]
    const temp = []
    //looping kode sebanyak n
    for (let i = 0; i < n; i++) {
        // panggil function getRandom dan masukin ke temp
        temp.push(getRandom(temp))
    }
    return temp
}

const getRandom = (temp) => {
    let i = true
    let kode
    //looping untuk memastikan kode2 yang ada unik
    while (i) {
        // generate angka random, lalu convert ke string hexadesimal, lalu ambil 4 karakter
        kode = Math.random().toString(16).substring(2, 6) + '-' + Math.random().toString(36).substring(2, 6)
        // cek jika kode sudah pernah dibuat maka lanjut looping untuk generate ulang
        i = (temp.find(el => el == kode)) ? true : false
    }
    return kode
}

let kodes = []
kodes = (generate(3))
kodes.map(kode => console.log(kode))