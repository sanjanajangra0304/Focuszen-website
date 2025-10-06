// List of ambient sounds
const sounds = [
    {id:'rain', name:'🌧 Rain'},
    {id:'forest', name:'🌲 Forest'},
    {id:'fireplace', name:'🔥 Fireplace'},
    {id:'water', name:'💧 Water'},
    {id:'wind', name:'🌬 Wind'}
];

const container = document.getElementById('soundContainer');
let currentAudio = null;

// Create sound controls dynamically
sounds.forEach(sound => {
    // Create control div
    const div = document.createElement('div');
    div.className = 'sound-control';
    div.innerHTML = `
        <p>${sound.name} Sound</p>
        <button id="${sound.id}-btn">Play</button>
    `;
    container.appendChild(div);

    // Create audio element
    const audio = document.createElement('audio');
    audio.id = sound.id;
    audio.src = `assets/sounds/${sound.id}.mp3`;
    audio.loop = true;
    container.appendChild(audio);

    // Button click event
    const btn = document.getElementById(`${sound.id}-btn`);
    btn.addEventListener('click', () => {
        // Pause any other sound playing
        if(currentAudio && currentAudio !== audio){
            currentAudio.pause();
            document.getElementById(`${currentAudio.id}-btn`).textContent = 'Play';
        }

        // Toggle current sound
        if(audio.paused){
            audio.play();
            btn.textContent = 'Pause';
            currentAudio = audio;
        } else {
            audio.pause();
            btn.textContent = 'Play';
            currentAudio = null;
        }
    });
});
