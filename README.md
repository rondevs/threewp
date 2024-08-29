# ThreeWP

**ThreeWP** is a WordPress plugin that integrates the Three.js library and its addons into your WordPress site using a custom bundle file. This setup allows you to create and manage custom 3D models, animations, and interactive graphics directly within your WordPress theme or custom JavaScript code.

## Features

-   **Custom Bundle Integration**: Enqueues the Three.js library and essential addons using a custom bundle file, avoiding reliance on a CDN.
-   **Easy Setup**: Straightforward installation and activation process.
-   **Custom Integration**: No built-in shortcodes or settings; users add their own Three.js code for full customization.

## Installation

1. **Download the Plugin**:

    - Download the plugin zip file from [GitHub Releases](https://github.com/rondevs/threewp/releases).

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

After activating the plugin, Three.js and its addons will be available for use in your theme or custom JavaScript files. You need to manually add your Three.js code to create and manage 3D content.

### Example Usage

**Add Custom JavaScript**:

-   Add your Three.js initialization and rendering code to your theme’s JavaScript file or use a custom script. Here’s a basic example:

```javascript
document.addEventListener('DOMContentLoaded', function () {
	if (typeof ThreeBundle !== 'undefined') {
		// Destructure THREE and THREE_ADDONS from ThreeBundle
		const { THREE, THREE_ADDONS } = ThreeBundle;
		// Create a scene
		const scene = new THREE.Scene();

		// Setup a camera
		const camera = new THREE.PerspectiveCamera(
			75,
			window.innerWidth / window.innerHeight,
			0.1,
			1000,
		);

		// Setup a renderer
		const renderer = new THREE.WebGLRenderer();
		// Give the renderer a width and height
		renderer.setSize(window.innerWidth, window.innerHeight);

		// append the renderer into the html body
		document.body.appendChild(renderer.domElement);

		// Set camera position
		camera.position.z = 2;

		// texture
		// Load a texture
		const textureLoader = new THREE.TextureLoader();
		const texture = textureLoader.load(
			'https://threejsfundamentals.org/threejs/resources/images/wall.jpg',
		); // Replace with your image URL

		// geometry
		const geometry = new THREE.BoxGeometry(1, 1, 1);

		// material
		const material = new THREE.MeshStandardMaterial({ map: texture });

		// combine into mesh
		const sphere = new THREE.Mesh(geometry, material);

		scene.add(sphere);

		const light = new THREE.AmbientLight(0xffffff);
		scene.add(light);

		// Set up OrbitControls
		const controls = new THREE_ADDONS.OrbitControls(
			camera,
			renderer.domElement,
		);

		// Optional: Adjust controls settings (e.g., damping, auto-rotation)
		controls.enableDamping = true; // Adds smoothness when dragging
		controls.dampingFactor = 0.03;
		controls.autoRotate = true;
		controls.autoRotateSpeed = 2;

		function animate(t = 0) {
			requestAnimationFrame(animate);
			controls.update();
			renderer.render(scene, camera);
		}

		animate();

		// responsive
		window.addEventListener('resize', () => {
			camera.aspect = window.innerWidth / window.innerHeight;
			camera.updateProjectionMatrix();
			renderer.setSize(window.innerWidth, window.innerHeight);
		});
	} else {
		console.error('Three.js could not be loaded.');
	}
});
```

NOTE: Destruncture `THREE` and `THREE_ADDONS` to access Three.js and the Addons.

### Tips

-   **Responsive Design**: Adjust the size of the Three.js container or renderer according to your design requirements. Handle window resizing events to keep the 3D content responsive.
-   **Documentation**: Refer to the [Three.js documentation](https://threejs.org/docs/) for detailed information on creating more complex scenes, objects, and animations.

## Changelog

-   **v2.0.0** - Introduced custom bundle file integration for Three.js and essential addons like OrbitControls, GLTFLoader, EffectComposer, and BloomPass etc. This version enhances the plugin's capabilities and provides a more comprehensive setup for integrating Three.js with WordPress.

## Contributing

We welcome contributions to improve this plugin. If you have suggestions, bug reports, or feature requests, please open an issue on [GitHub Issues](https://github.com/rondevs/threewp/issues).

## License

This plugin is licensed under the GPLv2 or later. See the [LICENSE](LICENSE) file for details.

## Support

If you encounter any issues or need assistance, please reach out via [GitHub Issues](https://github.com/rondevs/threewp/issues).

Thank you for using ThreeWP! We hope it enhances your WordPress site with exciting 3D content.
