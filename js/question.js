const queryString = window.location.search
const urlParams = new URLSearchParams(queryString)
const n = parseInt(urlParams.get('inf') || 1)

document.querySelector("form").addEventListener('submit', function() {
    const currentValue = parseInt(document.getElementById('inf').value)
    const nextValue = currentValue // já está incrementado no seu script

    // Redireciona manualmente com os parâmetros
    window.location.href = `questionario.html?inf=${nextValue}`
})

if (n > 5) {
    window.location.href = 'final.html'
}

// Define o valor atual e o próximo
const progressoAtual = ((n - 1) / 5) * 100
const progressoElem = document.getElementById("progresso")
const progressoAnterior = parseFloat(localStorage.getItem('progress') || 0)

// Define título e input hidden
document.getElementById("inf").value = n + 1
document.getElementById("h1").innerHTML = `${n}° Pergunta`

// Mostra visualmente o valor atual (como texto)
progressoElem.textContent = `Progresso ${progressoAtual}%`

// Aplica o progresso anterior (sem animar ainda)
progressoElem.style.setProperty('--progress', `${progressoAnterior}%`)

// Anima para o valor atual no próximo frame
requestAnimationFrame(() => {
    requestAnimationFrame(() => {
        progressoElem.style.setProperty('--progress', `${progressoAtual}%`)
    })
})

// Salva o valor atual para uso futuro
localStorage.setItem('progress', progressoAtual)
