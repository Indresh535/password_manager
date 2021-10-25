const resultEle = document.getElementById('result')
const lengthEle = document.getElementById('length')
const uppercaseEle = document.getElementById('uppercase')
const lowercaseEle = document.getElementById('lowercase')
const numbersEle = document.getElementById('numbers')
const symbolsEle = document.getElementById('symbols')
const generateEle = document.getElementById('generate')
const clipboardEle = document.getElementById('clipboard')


const randomFunc = {
    lower:getRandomLower,
    upper:getRandomUpper,
    number:getRandomNumber,
    symbol:getRandomSymbol
}

clipboardEle.addEventListener('click', () => {
    const textarea=document.createElement('textarea')
    const copypassword=resultEle.innerText

    if(!copypassword) {
        alert('Nothing to Copy')
    }else{     
    textarea.value=copypassword
    document.body.appendChild(textarea)
    textarea.select()
    document.execCommand('copy')
    textarea.remove()
    alert('Password Copied to Clipboard!')
    }
})

generateEle.addEventListener('click', () => {
    const length= +lengthEle.value
    const hasLower = lowercaseEle.checked
    const hasUpper = uppercaseEle.checked
    const hasNumber = numbersEle.checked
    const hasSymbols = symbolsEle.checked
    resultEle.innerText=generatePassword(hasLower,hasUpper,hasNumber,hasSymbols,length)
})

function generatePassword(lower,upper,number,symbol,length){
    let generatedPassword = ' '        // generated
    const typesCount = lower+upper+number+symbol
    const typesArr = [{lower},{upper},{number},{symbol}].filter(item=>Object.values(item)[0])
    
    if(typesCount == 0){
        return ''
    }

    for(let i=0;i<length;i+=typesCount){
        typesArr.forEach(type => {
            const funcName=Object.keys(type)[0]
            generatedPassword+=randomFunc[funcName]()   //generated
        })
    }

    const finalPassword = generatedPassword.slice(0,length)     //generated
    return finalPassword
}

function getRandomLower() {
    return String.fromCharCode(Math.floor(Math.random()*26) + 97)       //ASCII value of "a" is "97" , 26 letters in the Alphabet
}

function getRandomUpper() {
    return String.fromCharCode(Math.floor(Math.random()*26) + 65)       //ASCII value of "A" is "65" , 26 letters in the Alphabet
}

function getRandomNumber() {
    return String.fromCharCode(Math.floor(Math.random()*10) + 48)       //ASCII value of "0" is "48" , upto 10
}

function getRandomSymbol() {
    const symbols = ' !@#$%^&*()_+`~-= '
    return symbols[Math.floor(Math.random() * symbols.length)]
}









