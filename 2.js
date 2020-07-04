const check = (dataKey, word) => {
    if (typeof (dataKey) !== 'object' || typeof (word) !== 'string') return false
    dataKey.map(dt => {
        console.log(dt, '=>', word.includes(dt))
    })
}

let dataKey = ['out', 'stand', 'king', 'ding']
const word = 'outstanding'
check(dataKey, word)