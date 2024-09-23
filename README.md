# ThreeWP

**Contributors:** rondevs  
**Tags:** three.js, 3D, visualization  
**Requires at least:** 6.0  
**Tested up to:** 6.6.1  
**Requires PHP:** 8.3.8  
**Stable tag:** 2.0.2  
**License:** GPLv2 or later  
**License URI:** [GPLv2 License](http://www.gnu.org/licenses/gpl-2.0.html)

Easily integrate Three.js with WordPress to create and display 3D models and animations.

## Description

ThreeWP is a WordPress plugin that integrates the Three.js library and its addons into your WordPress site using a custom bundle file. This setup allows you to create and manage custom 3D models, animations, and interactive graphics directly within your WordPress theme or custom JavaScript code.

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
	if (typeof ThreeWP !== 'undefined') {
		// Destructure THREE and THREE_ADDONS from ThreeWP
		const { THREE, OrbitControls } = ThreeWP;
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

		// Append the renderer into the html body
		document.body.appendChild(renderer.domElement);

		// Set camera position
		camera.position.z = 2;

		// Load a texture
		const textureLoader = new THREE.TextureLoader();
		const texture = textureLoader.load(
			'https://threejsfundamentals.org/threejs/resources/images/wall.jpg',
		); // Replace with your image URL

		// Create geometry
		const geometry = new THREE.BoxGeometry(1, 1, 1);

		// Create material
		const material = new THREE.MeshStandardMaterial({ map: texture });

		// Combine into mesh
		const sphere = new THREE.Mesh(geometry, material);
		scene.add(sphere);

		const light = new THREE.AmbientLight(0xffffff);
		scene.add(light);

		// Set up OrbitControls
		const controls = new OrbitControls(camera, renderer.domElement);

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

		// Responsive
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

NOTE: Destruncture `THREE` and the `addons` to access from ThreeWP bundle.

Most Importantly insert the shortcode anywhere in the page in the content editor or a shortcode section:

```plaintext
[use_threewp]
```

Once added, Three.js will be enabled for that specific page, allowing you to include your custom 3D models and animations.

Hide the shortcode element to hide the shortcode container

### Tips

-   **Responsive Design**: Adjust the size of the Three.js container or renderer according to your design requirements. Handle window resizing events to keep the 3D content responsive.
-   **Documentation**: Refer to the [Three.js documentation](https://threejs.org/docs/) for detailed information on creating more complex scenes, objects, and animations.

## Available Tools in This Plugin

-   **THREE**
-   **Addons:**
    -   ArcballControls
    -   BufferGeometryUtils
    -   CameraUtils
    -   CCDIKSolver
    -   ConvexGeometry
    -   ConvexH
    -   CSS2DRenderer
    -   CSS3DRenderer
    -   DecalGeometry
    -   DRACOLoader
    -   DragControls
    -   EdgeSplitModifier
    -   EffectComposer
    -   FirstPersonControls
    -   FlyControls
    -   FontLoader
    -   GLTFLoader
    -   KTX2Loader
    -   LDrawLoader
    -   Lensflare
    -   LensflareElement
    -   LightProbeGenerator
    -   LightProbeHelper
    -   Lut
    -   LUT3dlLoader
    -   LUTCubeLoader
    -   MapControls
    -   MeshSurfaceSampler
    -   MMDAnimationHelper
    -   MMDLoader
    -   MMDPhysics
    -   MTLLoader
    -   OBB
    -   OBJLoader
    -   OrbitControls
    -   ParametricGeometry
    -   PCDLoader
    -   PDBLoader
    -   PointerLockControls
    -   PositionalAudioHelper
    -   RectAreaLightHelper
    -   Rhino3dmLoader
    -   SceneUtils
    -   SDFGeometryGenerator
    -   SkeletonUtils
    -   Sky
    -   SVGLoader
    -   SVGRenderer
    -   TeapotGeometry
    -   TextGeometry
    -   TGALoader
    -   Timer
    -   TrackballControls
    -   TransformControls
    -   VertexNormalsHelper
    -   VertexTangentsHelper
    -   XREstimatedLight

## Changelog

-   **v2.0.2** -Updated custom bundle file. Removed external dependencies from the bundle. Introduced shortcode `[use_threewp]` to load the Three.js bundle script only on pages that contain the shortcode.

-   **v2.0.1** - Added `defer` attribute to the Three.js script for improved performance and load times.Updated plugin code for better compatibility with modern browsers.

-   **v2.0.0** - Introduced custom bundle file integration for Three.js and essential addons like OrbitControls, GLTFLoader, EffectComposer, and BloomPass etc. This version enhances the plugin's capabilities and provides a more comprehensive setup for integrating Three.js with WordPress.

-   **v1.1.0** - Added Three.js Addons Support with CDN.

-   **v1.0.0** - Initial release of the Three.js CDN Integration plugin.

## Frequently Asked Questions

### How do I use Three.js with this plugin?

After activating the plugin, you can include Three.js code in your theme, HTML element, or custom plugin to create and manage 3D models.

## Contributing

We welcome contributions to improve this plugin. If you have suggestions, bug reports, or feature requests, please open an issue on [GitHub Issues](https://github.com/rondevs/threewp/issues).

## License

This plugin is licensed under the GPLv2 or later. See the [LICENSE](LICENSE) file for details.

## Support

If you encounter any issues or need assistance, please reach out via [GitHub Issues](https://github.com/rondevs/threewp/issues).

Thank you for using ThreeWP! We hope it enhances your WordPress site with exciting 3D content.
