# ThreeWP

**ThreeWP** is a lightweight WordPress plugin designed to integrate the Three.js library into your WordPress site. This plugin allows you to use Three.js for creating custom 3D models, animations, and interactive graphics directly in your WordPress theme or custom JavaScript code.

## Features

-   **Integrates Three.js**: Enqueues the Three.js library from a CDN, making it available for your custom scripts.
-   **Easy Setup**: Simple installation and activation process.
-   **Custom Integration**: Provides no built-in shortcodes or settings; users add their own Three.js code.

## Installation

1. **Download the Plugin**:

    - You can download the plugin zip file from [GitHub Releases](https://github.com/your-username/your-plugin-name/releases).

2. **Upload the Plugin**:

    - Log in to your WordPress admin panel.
    - Navigate to **Plugins > Add New**.
    - Click **Upload Plugin** and select the downloaded zip file.
    - Click **Install Now** and then **Activate** the plugin.

3. **Manual Installation**:
    - Alternatively, you can clone the repository or download it as a ZIP file.
    - Upload the `threewp` folder to the `wp-content/plugins/` directory of your WordPress installation.
    - Activate the plugin through the **Plugins** menu in WordPress.

## Usage

After activating the plugin, Three.js will be available for use in your theme or custom JavaScript files. You need to manually add your Three.js code to create and manage 3D content.

### Example Usage

1. **Add HTML Container**:

    - Ensure you have a container element in your HTML where the Three.js scene will be rendered. Add this to your WordPress theme’s template file or a page:

        ```html
        <div id="threewp-container" style="width: 100%; height: 500px;"></div>
        ```

2. **Add Custom JavaScript**:

    - Add your Three.js initialization and rendering code to your theme’s JavaScript file or use a custom script. Here’s a basic example:

        ```javascript
        document.addEventListener('DOMContentLoaded', function () {
        	if (typeof THREE !== 'undefined') {
        		// Create a scene
        		const scene = new THREE.Scene();

        		// Create a camera
        		const camera = new THREE.PerspectiveCamera(
        			75,
        			window.innerWidth / window.innerHeight,
        			0.1,
        			1000,
        		);

        		// Create a renderer
        		const renderer = new THREE.WebGLRenderer();
        		renderer.setSize(window.innerWidth, window.innerHeight);
        		document
        			.getElementById('threewp-container')
        			.appendChild(renderer.domElement);

        		// Create a cube
        		const geometry = new THREE.BoxGeometry();
        		const material = new THREE.MeshBasicMaterial({
        			color: 0x00ff00,
        		});
        		const cube = new THREE.Mesh(geometry, material);
        		scene.add(cube);

        		camera.position.z = 5;

        		// Animation loop
        		function animate() {
        			requestAnimationFrame(animate);
        			cube.rotation.x += 0.01;
        			cube.rotation.y += 0.01;
        			renderer.render(scene, camera);
        		}
        		animate();
        	} else {
        		console.error('Three.js could not be loaded.');
        	}
        });
        ```

### Tips

-   **Responsive Design**: Adjust the size of the Three.js container or renderer based on your design requirements. You may need to handle window resizing events to keep the 3D content responsive.
-   **Documentation**: Refer to the [Three.js documentation](https://threejs.org/docs/) for detailed information on creating more complex scenes, objects, and animations.

## Changelog

-   **v1.0.0** - Initial release. Enqueues the Three.js library and provides a basic setup for using Three.js with WordPress.

## Contributing

We welcome contributions to improve this plugin. If you have suggestions, bug reports, or feature requests, please open an issue on [GitHub Issues](https://github.com/rondevs/threewp/issues).

## License

This plugin is licensed under the GPLv2 or later. See the [LICENSE](LICENSE) file for details.

## Support

If you encounter any issues or need assistance, please reach out via [GitHub Issues](https://github.com/rondevs/threewp/issues)

Thank you for using ThreeWP! We hope it enhances your WordPress site with exciting 3D content.
