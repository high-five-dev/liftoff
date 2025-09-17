import '../style/style.css'

if (import.meta.hot) {
  import.meta.hot.accept(() => {
    console.log("🔥🔄 HMR")
  });
}

// Do some JS magic!
console.log(`🚀 Blastoff!`);