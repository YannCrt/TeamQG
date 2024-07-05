document.addEventListener('DOMContentLoaded', function() {
    let navButtons = document.querySelectorAll('.navibutton');
    
    navButtons.forEach(button => {
        let svgBorder = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        svgBorder.setAttribute("class", "svg-border");
        svgBorder.setAttribute("viewBox", "0 0 100 100");
        svgBorder.setAttribute("stroke", "currentColor");
        svgBorder.setAttribute("stroke-width", "2");
        svgBorder.style.position = "absolute";
        svgBorder.style.left = "0";
        svgBorder.style.top = "0";
        svgBorder.style.width = "100%";
        svgBorder.style.height = "100%";

        let clipPath = document.createElementNS("http://www.w3.org/2000/svg", "clipPath");
        let clipPathId = `svg-border-cp-${Date.now()}`;
        clipPath.setAttribute("id", clipPathId);

        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");
        path.setAttribute("d", `M 50 100 h 25 a 50 50 0 1 0 0 -100 h -50 a 50 50 0 1 0 0 100 h 25`);
        clipPath.appendChild(path);

        svgBorder.appendChild(clipPath);
        
        let borderPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
        borderPath.setAttribute("clip-path", `url(#${clipPathId})`);
        borderPath.setAttribute("d", `M 50 100 h 25 a 50 50 0 1 0 0 -100 h -50 a 50 50 0 1 0 0 100 h 25`);
        borderPath.setAttribute("fill", "none");
        borderPath.setAttribute("pathLength", "100");
        
        svgBorder.appendChild(borderPath);
        button.appendChild(svgBorder.cloneNode(true));
        button.appendChild(svgBorder);
    });

    navButtons.forEach((button, index) => {
        button.addEventListener('mouseenter', function(event) {
            button.classList.add('is-hovered');
        });

        button.addEventListener('mouseleave', function(event) {
            button.classList.remove('is-hovered');
        });
    });
});
