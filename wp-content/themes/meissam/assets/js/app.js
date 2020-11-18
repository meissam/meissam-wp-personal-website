VANTA.TOPOLOGY({
    el: "#vanta",
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    scale: 1.00,
    scaleMobile: 1.00,
    color: 0x8faaaa,
    backgroundColor: 0xededed
  })

  var btns = document.querySelectorAll('.clipboard');
  var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function(e) {
        console.log("Copied");
    });