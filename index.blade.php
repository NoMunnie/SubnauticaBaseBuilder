@extends('layouts.app')

@section( 'title', $tool->game . ' ' . $tool->name )

@section('content')
    <div class="loading-screen">
        <h2>Preloading Assets...</h2>
        <div class="loading-bar"></div>
    </div>
    <div class="wrapper-box">
        <div class="side-nav">

            <div class="side-nav-box">
                <div class="title">
                    <h1 class="side-nav-title">{{ $tool->game }} {{ $tool->name }}</h1><i class="text-white fa fa-chevron-down hide-side-nav pull-right"></i>
                </div>
                <div class="main-menu">
                    <ul class="legend-menu">
                        <li>
                            <a href="#">
                                <i class="fa fa-map-signs"></i> <span>Objects</span>
                            </a>
                            <ul class="meshes">
                                <li>
                                    <input type="search" style="margin: 0 auto;" class="form-control col-md-9 search-object-list" placeholder="Search.." />
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-map-signs"></i> <span>Added Objects</span>
                            </a>
                            <ul class="added-meshes">
                                <li>
                                    <input type="search" style="margin: 0 auto;" class="form-control col-md-9 search-spawned-objects" placeholder="Search.." />
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-map-signs"></i> <span>Resource Cost</span>
                            </a>
                            <ul class="resources-list">
                                <li>
                                    <input type="search" style="margin: 0 auto;" class="form-control col-md-9 search-base-cost" placeholder="Search.." />
                                </li>
                            </ul>
                        </li>
                        <li style="text-align: center; padding: 12px 22px; display: block;" class="w-100">
                            <a style="text-align: center; display: block;" href="#" class="btn btn-success w-100 open-help-modal" data-toggle="modal" data-target="#THREEInfoModal">Movement Help</a>
                        </li>
                        @auth
                            {{--<li style="text-align: center; padding: 12px 22px;">--}}
                                {{--<button class="btn btn-warning w-100">Load Objects</button>--}}
                            {{--</li>--}}
                            {{--<li style="text-align: center; padding: 12px 22px;">--}}
                                {{--<button class="btn btn-primary w-100">Save Objects</button>--}}
                            {{--</li>--}}
                        @endauth
                    </ul>
                    @if( $tool->id == 1 )
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" min="0" max="3040" placeholder="Base Depth" class="depth form-control" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary update-depth">Set</button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <ul>
                        <li>
                            <br />
                            <p class="text-white text-sm" style="text-align: center; font-size: .75rem;">{{ $tool->game }} content and materials are trademarks and copyrights of {{ $tool->game }}'s creators and its licensors. All Rights Reserved. AllGameMaps is not affiliated with the creators of {{ $tool->game }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar-container-right">
            <button class="btn btn-primary hide-container-sidebar mt-5 mb-3" style="display: none;">Hide</button>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- map-right-sidebar-ad -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-9345502086971471"
                 data-ad-slot="5313661779"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
    <div class="bottom-nav" style="margin: 0 auto; text-align: center;">
        <ul style="margin: 0 auto;">
            @if( $tool->id == 1 )
                <li class="hull-integrity" style="font-weight: bold;">
                    Hull Integrity: 10
                </li>
            @endif
        </ul>
    </div>

    <!-- Info Modal-->
    <div class="modal fade modal-fullscreen" id="THREEInfoModal" tabindex="-1" role="dialog" aria-labelledby="THREEInfoModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Controls</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Freecam Controls:</h2>
                    <ul>
                        <li>WASD = Move freecam.</li>
                        <li>C = Move down.</li>
                        <li>Spacebar = Move up.</li>
                        <li>Middle Mouse Button = Enter freecam mode.</li>
                        <li>Left ALT = Exit freecam mode.</li>
                        <li>Left Shift = Move faster.</li>
                    </ul>
                    <hr />
                    <h2>Editor Controls:</h2>
                    <ul>
                        <li>T = Move object mode.</li>
                        <li>R = Rotate object mode.</li>
                        {{--<li>Y = Scale object mode.</li>--}}
                        <li>Left CTRL(Hold) = Disable snapping mode.</li>
                        <li>+ = Increase controls size.</li>
                        <li>- = Decrease controls size.</li>
                    </ul>
                    <p>You can view this info modal at any time by clicking the green "Help" button in the sidebar.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger close-help-modal" type="button" data-dismiss="modal">Got it.</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section( 'styles' )
    <style>
        .side-nav {
            position: absolute;
            bottom: 60px;
            overflow-y: auto;
            max-height: calc( 100vh - 60px - 60px - 50px );
            min-height: calc( 100vh - 60px - 60px - 50px ) !important;
            opacity: .5;
            transition: .2s linear;
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        @media (max-width: 1101px )
        {
            .side-nav {
                max-height: none;
                opacity: 1;
                left: 0;
            }
        }

        .top-nav {
            background: linear-gradient(to right, #263238, #7000BE) !important;
        }

        .side-nav:hover, .side-nav:focus /*, .side-nav *:hover, .side-nav *:focus*/ {
            opacity: 1 !important;
        }

        .bottom-nav::-webkit-scrollbar
        {
            height: .1rem;
        }

        .side-nav-title {
            color: #FFF;
            font-size: 1rem;
            display: inline-block;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            background: linear-gradient(to right, #263238, #7000BE) !important;
            width: 100vw;
            height: 60px;
            z-index: 999;
            overflow-x: auto;
            overflow-y: hidden;
        }

        .bottom-nav ul {
            margin: 0 auto;
            display: inline-flex;
            height: 100%;
            justify-content: center;
            flex-direction: row;
            align-items: center;
        }

        .bottom-nav li {
            list-style-type: none;
            font-size: 1.5rem;
            color: #FFF;
        }

        .bottom-nav li a {
            color: #FFF;
            padding: 17px;
        }

        .bottom-nav li a:hover {
            color: #AAA;
        }

        canvas {
            height: calc( 100vh - 60px - 60px );
            width: 100vw;
            position: absolute;
            top: 60px;
            left: 0;
        }

        .hide-side-nav:hover {
            cursor: pointer;
        }

        .coords {
            padding: 2px 4px;
            border-radius: 5px;
        }

        .breadcrumb-item, .card-link {
            vertical-align: middle;
        }

        @media (min-width: 768px) {
            .modal-xl {
                width: 90%;
                max-width:1200px;
            }
        }

        .enlarge {
            font-size: 1rem;
            line-height: 1.9;
            outline: none !important;
            float: right;
            font-weight: 700;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
            margin: -1rem -1rem -1rem auto;
            padding: 1rem;
            background-color: transparent;
            border: 0;
            -webkit-appearance: none;
            cursor: pointer;
        }

        .close {
            margin: -1rem -1rem -1rem 0 !important;
            outline: none !important;
        }

        .ui .result {
            display: table !important;
            width: 100% !important;
        }

        .ui .result .image {
            float: none !important;
            overflow: auto !important;
            width: auto !important;
        }

        .ui .result .image, .ui.search .result .content {
            display: table-cell !important;
            vertical-align: middle !important;
        }

        .loading-screen {
            width: 100vw;
            height: calc( 100vh - 60px );
            background-color: #FFF;
            z-index: 1100;
            position: fixed;

        }

        .loading-bar {
            width: 0;
            height: 1vh;
            background: linear-gradient(to right, #263238, #7000BE);
            position: fixed;
            z-index: 1200;
            top: calc( ( 99vh + 60px ) / 2 );
            left: 40vw;
        }

        .loading-screen h2 {
            position: fixed;
            top: calc( ( ( 99vh + 60px ) / 2 ) - 4vh );
            left: 40vw;
            width:20vw;
            text-align: center;
        }

        .added-meshes li a {
            display: inline-block !important;
        }
        .added-meshes li i:hover {
            cursor: pointer;
        }
    </style>
@endsection
@section('scripts-body')
    <script src="{{ asset( 'js/threejs.min.js' ) }}"></script>

    <script src="{{ asset( 'plugins/threejs/libs/inflate.min.js' ) }}"></script>
    <script src="{{ asset( 'plugins/threejs/loaders/FBXLoader.js' ) }}"></script>
    <script src="{{ asset( 'plugins/threejs/loaders/TDSLoader.js' ) }}"></script>

    <script src="{{ asset( 'plugins/threejs/loaders/DDSLoader.js' ) }}"></script>
    <script src="{{ asset( 'plugins/threejs/loaders/MTLLoader.js' ) }}"></script>
    <script src="{{ asset( 'plugins/threejs/loaders/OBJLoader.js' ) }}"></script>

    <script src="{{ asset( 'plugins/threejs/Detector.js' ) }}"></script>
    <script src="{{ asset( 'plugins/threejs/controls/OrbitControls.js' ) }}"></script>
    <script src="{{ asset( 'plugins/threejs/controls/TransformControls.js' ) }}"></script>
    <script src="{{ asset( 'plugins/threejs/libs/stats.min.js' ) }}"></script>
    
    <script type="JSON/three3dScene" id="scene">
    {
        "metadata": {
            "version": 4.3,
            "type": "Object",
            "generator": "ObjectExporter"
        },
        "geometries": [
        {
            "uuid": "B69218A2-D496-4D00-B56A-0C84C0E2496F",
            "type": "BoxGeometry",
            "width": 0.3,
            "height": 0.3,
            "depth": 0.3,
            "widthSegments": 1,
            "heightSegments": 1,
            "depthSegments": 1
        },
        {
            "uuid": "F9A9A11D-0865-4D97-A3E1-BCB1E784FAD4",
            "type": "BoxGeometry",
            "width": 10,
            "height": 1,
            "depth": 10,
            "widthSegments": 1,
            "heightSegments": 1,
            "depthSegments": 1
        },
        {
            "uuid": "02E3B482-A0C0-4F4E-BBD9-48F71053B16F",
            "type": "BoxGeometry",
            "width": 0.5,
            "height": 0.5,
            "depth": 0.5,
            "widthSegments": 1,
            "heightSegments": 1,
            "depthSegments": 1
        }],
        "materials": [
        {
            "uuid": "5F5D931D-711F-49D8-B09D-DFB5A69D0235",
            "type": "MeshPhongMaterial",
            "color": 16777215,
            "ambient": 16777215,
            "emissive": 0,
            "specular": 1118481,
            "shininess": 30,
            "opacity": 1,
            "transparent": false,
            "wireframe": false
        },
        {
            "uuid": "0E9610A2-3992-4CDA-B975-35DF4637A478",
            "type": "MeshPhongMaterial",
            "color": 10102619,
            "ambient": 16777215,
            "emissive": 0,
            "specular": 1118481,
            "shininess": 30,
            "opacity": 1,
            "transparent": false,
            "wireframe": false
        },
        {
            "uuid": "DA355686-5DF8-4D15-BEA3-CFE56597591D",
            "type": "MeshPhongMaterial",
            "color": 2866024,
            "ambient": 16777215,
            "emissive": 0,
            "specular": 1118481,
            "shininess": 30,
            "opacity": 1,
            "transparent": false,
            "wireframe": false
        }],
        "object": {
            "uuid": "D0190E26-9136-4C26-9ABD-C7F7B099796E",
            "type": "Scene",
            "matrix": [1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1],
            "children": [
            {
                "uuid": "6B8B6E02-FEAB-420C-AA8C-00F0D59F4C47",
                "name": "DirectionalLight 1",
                "type": "DirectionalLight",
                "color": 13560059,
                "intensity": 0.18,
                "matrix": [1,0,0,0,0,1,0,0,0,0,1,0,-10.579999923706055,13.850000381469727,5.039999961853027,1]
            },
            {
                "uuid": "CF71F843-BFE6-4E90-B532-CB635010F6A5",
                "name": "Player",
                "type": "Object3D",
                "matrix": [0.738468587398529,0,0.6742879152297974,0,0,1,0,0,-0.6742879152297974,0,0.738468587398529,0,0,0,0,1],
                "children": [
                {
                    "uuid": "55F4AEFB-8A55-4A1C-8DD8-94D2B6F2CBD0",
                    "name": "PlayerHead",
                    "type": "Mesh",
                    "geometry": "B69218A2-D496-4D00-B56A-0C84C0E2496F",
                    "material": "5F5D931D-711F-49D8-B09D-DFB5A69D0235",
                    "matrix": [1,0,0,0,0,0.9427546858787537,-0.3334870934486389,0,0,0.3334870934486389,0.9427546858787537,0,0,1.600000023841858,0,1]
                }]
            }]
        }
    }
    </script>

    <script>
        var meshFactory = [];
        var loadedObjects = [], currentObject = null;
        var manager, control, mouse = { x: 0, y: 0 }, objects = [], depthmultiplier = ( ( 100 - 100 ) / 1000 ) + 1.0, base_integrity = 10;
        nanobar.go( 100 );

        //        $( '.loading-screen' ).hide();

        function init()
        {
            if( isSmallScreen )
            {
                $( '.loading-screen h2' ).html(
                    'This application cannot be used on mobile devices, however, you can still view our 2D Subnautica maps!<br /><br />' +
                    '<a href="{{ route( 'LoadMap', [ 'dir' => 'subnautica', 'name' => 'map' ] ) }}">Main Map</a><br />' +
                    '<a href="{{ route( 'LoadMap', [ 'dir' => 'subnautica', 'name' => 'jellyshroom' ] ) }}">Jellyshroom Caves</a><br />' +
                    '<a href="{{ route( 'LoadMap', [ 'dir' => 'subnautica', 'name' => 'dgr' ] ) }}">Deep Grand Reef</a><br />' +
                    '<a href="{{ route( 'LoadMap', [ 'dir' => 'subnautica', 'name' => 'lostriver' ] ) }}">The Lost River</a><br />' +
                    '<a href="{{ route( 'LoadMap', [ 'dir' => 'subnautica', 'name' => 'ilz' ] ) }}">Inactive Lava Zone</a><br />' +
                    '<a href="{{ route( 'LoadMap', [ 'dir' => 'subnautica', 'name' => 'alz' ] ) }}">Active Lava Zone</a><br />'
                ).css( { 'font-size': '1rem', 'width': '100%', 'left': 0 });
                $( '.loading-screen .loading-bar' ).hide();
                return;
            }

            manager = new THREE.LoadingManager();
            manager.onProgress = function ( item, loaded, total ) {
                $( '.loading-bar' ).css( 'width', ( ( loaded / total * 100 ) * .2 ) + '%' );
                //console.log( loaded / total * 100 );
                //console.log( 'downloaded' );
            };

            manager.onLoad = function () {
                //console.log( 'loaded' );

                $( '.loading-screen' ).hide();

                //notify( 'T = Move; R = Rotate; Y = Scale; CTRL = Toggle Snap Mode; +/- = Change controls size; Middle-Mouse-Button = Moveable Camera Mode; ALT = Exit Moveable Camera Mode; WASD = Movement keys', 10000 );
            };

            var loader = new THREE.ObjectLoader( manager );
            var source = document.getElementById('scene').innerHTML;
            scene = loader.parse(JSON.parse(source));

            THREE.Loader.Handlers.add( /\.dds$/i, new THREE.DDSLoader() );

            @foreach( $prefabs as $idx => $prefab )

            // disable scanner room wall planter/reinforcement for now since it has the wrong model
            @if( $prefab->id == 31 || $prefab->id == 32 )
            @continue
            @endif

            new THREE.MTLLoader( manager ).setPath( '{{ asset( 'tools/' ) . '/' . $tool->path . '/models/' . $prefab->filename }}/' )
                .load( '{{ $prefab->filename . '.mtl' }}', function ( materials ) {
                    materials.preload();
                    new THREE.OBJLoader( manager )
                        .setMaterials( materials )
                        .setPath( '{{ asset( 'tools/' ) . '/' . $tool->path . '/models/' . $prefab->filename }}/' )
                        .load( '{{ $prefab->filename . '.obj' }}', function ( object ) {

                            object.traverse( function ( child ) {
                                if ( child.isMesh ) {
                                    child.castShadow = true;
                                    child.receiveShadow = true;
                                }
                            } );

                            object.position.set( 0, 5000, 0 );
                            object.rotation.set( {{ $prefab->rx }}, {{ $prefab->ry }}, {{ $prefab->rz }} );
                            object.scale.set( {{ $prefab->sx }}, {{ $prefab->sy }}, {{ $prefab->sz }} );
                            object.castShadow = true;
                            object.name = '{{ $prefab->name }}';
                            object.userData = {
                                name: '{{ $prefab->name }}',
                                integrity: {{ $prefab->hull_integrity }},
                                resources: JSON.parse( '{!! json_encode( $prefab->resources ) !!}' ),
                                resource_breakdown: JSON.parse( '{!! json_encode( $prefab->resource_breakdown ) !!}' ),
                                rotation: {
                                    x: {{ $prefab->rx }},
                                    y: {{ $prefab->ry }},
                                    z: {{ $prefab->rz }}
                                },
                                scale: {
                                    x: {{ $prefab->sx }},
                                    y: {{ $prefab->sy }},
                                    z: {{ $prefab->sz }}
                                },
                                offset: {
                                    x: 0,
                                    y: 0,
                                    z: 0
                                },
                                snapOffset: {
                                    move: {
                                        x: {{ $prefab->snapmove_x }},
                                        y: {{ $prefab->snapmove_y }},
                                        z: {{ $prefab->snapmove_z }}
                                    },
                                    rotation: {{ $prefab->snaprot }}
                                }
                            };
                            meshFactory.push( object );
                            objects.push( object.userData );

                            $( '.meshes' ).append(
                                '<li><a style="font-weight: bold; color: {{ ( ( $prefab->hull_integrity < 0 ) ? ( "#F00" ) : ( $prefab->hull_integrity == 0 ? "#FFF" : "#0F0" ) ) }}" href="#" id="{{ $idx }}">{{ $prefab->name }}</a></li>'
                            );

                            scene.add( object );

                            //                            scene.add( object );

                        }, function( e ) {  }, function( e ) {  } );
                } );
                    @endforeach

            var skyGeo = new THREE.SphereGeometry( 2000, 25, 25);
            var material = new THREE.MeshPhongMaterial({
                color: 0xEEEEEE
            });

            var light = new THREE.AmbientLight( 0xBBBBBB ); // soft white light
            scene.add( light );

            var sky = new THREE.Mesh(skyGeo, material);
            sky.material.side = THREE.BackSide;
            scene.add(sky);

            var grid = new THREE.GridHelper( 300, 100, 0x000000, 0x999999 );
            grid.position.set( 0, {{ $tool->gridoffset }}, 0 );
            grid.material.opacity = .5;
            grid.material.transparent = true;
            scene.add( grid );

            window.addEventListener( 'keydown', function ( event ) {

                switch ( event.keyCode ) {

                    case 81: // Q
                        control.setSpace( control.space === "local" ? "world" : "local" );
                        break;

                    case 17: // Ctrl
                        control.setTranslationSnap( null );
                        control.setRotationSnap( null );
                        break;

                    case 84: // T
                        control.setMode( "translate" );
                        break;

                    case 82: // R
                        control.setMode( "rotate" );
                        break;

//                    case 89: // R
//                        control.setMode( "scale" );
//                        break;

                    case 187:
                    case 107: // +, =, num+
                        control.setSize( control.size + 0.1 );
                        break;

                    case 189:
                    case 109: // -, _, num-
                        control.setSize( Math.max( control.size - 0.1, 0.1 ) );
                        break;

                }

                return false;

            });

            window.addEventListener( 'keyup', function ( event ) {

                switch ( event.keyCode ) {

                    case 17: // Ctrl
                        if( currentObject === null )
                            return;

                        control.setTranslationSnap( new THREE.Vector3( currentObject.userData.snapOffset.move.x, currentObject.userData.snapOffset.move.y, currentObject.userData.snapOffset.move.z ) );
                        control.setRotationSnap( THREE.Math.degToRad( currentObject.userData.snapOffset.rotation ) );
                        break;

                }

            });

            setupRendering();
            mouseControls = new Mouse3DControls(player,playerHead);
            keyboardControls = new Keyboard3DControls(player);
            requestAnimationFrame(loop);
//            nanobar.go( 100 );
        }

        function setupRendering(){
            camera = new THREE.PerspectiveCamera(45,window.innerWidth/window.innerHeight,0.1,10000);
            player = scene.getObjectByName('Player');
            playerHead = scene.getObjectByName('PlayerHead',true);
            playerHead.add(camera);
            player.position.set( -20, 10, 20 );
            renderer = new THREE.WebGLRenderer({antialias:true});
            canvas = renderer.domElement;
            $( '.wrapper-box' ).append( canvas );
            resize();
            addEventListener('resize',resize);

//            var selectedObject;
//
            control = new THREE.TransformControls( camera, renderer.domElement );
            control.addEventListener( 'change', render );

            raycaster = new THREE.Raycaster();
            mouse = new THREE.Vector2();

            document.addEventListener( 'mousedown', onDocumentMouseDown, false );
//            document.addEventListener( 'touchstart', onDocumentTouchStart, false );

            renderer.domElement.addEventListener("click", onclick, true);
        }

        function resize(){
            renderer.setSize(window.innerWidth,window.innerHeight,false);
            camera.aspect = window.innerWidth/window.innerHeight;
            camera.updateProjectionMatrix();
        }

        function loop(){
            keyboardControls.update();
            render();
            requestAnimationFrame(loop);
        }
        function onDocumentMouseDown( event ) {

//            event.preventDefault();

            let canvasBounds = renderer.context.canvas.getBoundingClientRect();
            mouse.x = ( ( event.clientX - canvasBounds.left ) / ( canvasBounds.right - canvasBounds.left ) ) * 2 - 1;
            mouse.y = - ( ( event.clientY - canvasBounds.top ) / ( canvasBounds.bottom - canvasBounds.top) ) * 2 + 1;

//            raycaster.setFromCamera( mouse, camera );
//
//            var intersects = raycaster.intersectObjects( loadedObjects );
//
//            if ( intersects.length > 0 ) {
//
////                intersects[ 0 ].object.material.color.setHex( Math.random() * 0xffffff );
////
////                var particle = new THREE.Sprite( particleMaterial );
////                particle.position.copy( intersects[ 0 ].point );
////                particle.scale.x = particle.scale.y = 16;
////                scene.add( particle );
//            }
        }

        function render() {
            renderer.render(scene, camera);
        }

        $( document ).on( 'input', '.search-object-list', function( e ) {
            var value = $( this ).val();

            var self = this;

            setTimeout( function( ) {
                if( $( self ).val() === value )
                {
                    $( '.meshes li a' ).show().each( function( ) {
                        if( $( this ).text().toLowerCase().indexOf( value.toLowerCase() ) === -1 )
                            $( this ).hide();
                    } );
                }
            }, 250 );
        } );

        $( document ).on( 'input', '.search-spawned-objects', function( e ) {
            var value = $( this ).val();

            var self = this;

            setTimeout( function( ) {
                if( $( self ).val() === value )
                {
                    $( '.added-meshes li a' ).show().each( function( ) {
                        if( $( this ).text().toLowerCase().indexOf( value.toLowerCase() ) === -1 )
                            $( this ).hide();
                    } );
                }
            }, 250 );
        } );

        $( document ).on( 'touchend click', '.side-nav .added-meshes a', function( e ) {
            e.preventDefault();

            control.detach();
            var id = $( this ).attr( 'object-id' );

            if( loadedObjects[ id ] === undefined )
                return;


            control.setTranslationSnap( new THREE.Vector3( loadedObjects[ id ].userData.snapOffset.move.x, loadedObjects[ id ].userData.snapOffset.move.y, loadedObjects[ id ].userData.snapOffset.move.z ) );
            control.setRotationSnap( THREE.Math.degToRad( loadedObjects[ id ].userData.snapOffset.rotation ) );

            currentObject = loadedObjects[ id ];

            control.attach( loadedObjects[ id ] );

//            return false;
        } );

        $( document ).on( 'touchend click', '.side-nav .added-meshes i', function( e ) {
            e.preventDefault();

            var id = $( this ).attr( 'object-id' );
            if( loadedObjects[ id ] === undefined )
                return;

            control.detach();

            currentObject = null;
            scene.remove( loadedObjects[ id ] );

            var done = false;

            var objectid = loadedObjects[ id ].userData.id;

            for( i = 0; i < objects[ objectid ].resources.length; i++ )
            {
                $( '.resources-list li a' ).each( function( ) {
                    if( $( this ).attr( 'resource-name' ) == objects[ objectid ].resources[ i ].name )
                    {
                        var amount = parseInt( $( this ).attr( 'amt' ) ) - parseInt( objects[ objectid ].resources[ i ].amount );
                        $( this ).text( objects[ objectid ].resources[ i ].name + ': ' + amount );
                        $( this ).attr( 'amt', amount );

                        if( amount <= 0 )
                            $( this ).parent().remove();
                    }
                } );
            }

            updateHullIntegrity( -objects[ loadedObjects[ id ].userData.id ].integrity );

            $( this ).parent().remove();
            delete loadedObjects[ id ];
        } );

        $( document ).on( 'touchend click', '.close-help-modal', function( e ) {
            $( '.open-help-modal' ).blur();
            $( '.open-help-modal' ).parent().blur();
        } );

        $( document ).on( 'touchend click', '.update-depth', function( e ) {
            var depth = $( '.depth' ).val();

            if( !isNumeric( depth ) )
                return notify( 'Please make sure to enter a numeric value', 2000 );

            if( depth <= 100 )
                depthmultiplier = 1;
            else
                depthmultiplier = ( ( depth - 100 ) / 1000 ) + 1.0;

            if( loadedObjects.length > 0 )
            {
                base_integrity = 10;
                for( var i = 0; i < loadedObjects.length; i++ )
                {
                    updateHullIntegrity( loadedObjects[ i ].userData.integrity );
                }
            }

            notify( 'Depth Multiplier updated!', 3000 );
        } );

        function isNumeric(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }

        function updateHullIntegrity( integrity )
        {
            $( '.hull-integrity' ).css( 'color', '#FFF' );

            if( integrity < 0 )
                base_integrity += integrity * depthmultiplier;
            else
                base_integrity += integrity;

            $( '.hull-integrity' ).text( 'Hull Integrity: ' + base_integrity.toFixed( 2 ) );

            if( base_integrity < 0 )
                $( '.hull-integrity' ).css( 'color', '#F00' );
        }

        $( document ).on( 'touchend click', '.side-nav .meshes a', function( e ) {
            e.preventDefault();

            var id = -1;
            var name = $( this ).text();

            for( var i = 0; i < objects.length; i++ )
                if( objects[ i ].name == name )
                    id = i;

            if( id === -1 )
                return;

            var parent = scene.getObjectByName( objects[ id ].name );

            if( parent === undefined )
                return;

            var obj = parent.clone();

            obj.position.set( objects[ id ].offset.x, objects[ id ].offset.y, objects[ id ].offset.z );
            obj.rotation.set( objects[ id ].rotation.x, objects[ id ].rotation.y, objects[ id ].rotation.z );
            obj.scale.set( objects[ id ].scale.x, objects[ id ].scale.y, objects[ id ].scale.z );
            obj.castShadow = true;
            obj.name = objects[ id ].name;
            obj.userData = objects[ id ];
            obj.userData.id = id;

            loadedObjects.push( obj );

            $( '.added-meshes' ).append(
                '<li><a href="#" object-id="' + ( loadedObjects.length - 1 ) + '">' + objects[ id ].name + '</a><i class="fa fa-times" object-id="' + ( loadedObjects.length - 1 ) + '" style="color: #C00;"></i></li>'
            );

            var done = false;

            for( i = 0; i < objects[ id ].resources.length; i++ )
            {
                done = false;

                $( '.resources-list li a' ).each( function( ) {
                    if( $( this ).attr( 'resource-name' ) == objects[ id ].resources[ i ].name )
                    {
                        var amount = ( parseInt( objects[ id ].resources[ i ].amount ) + parseInt( $( this ).attr( 'amt' ) ) );
                        $( this ).text( objects[ id ].resources[ i ].name + ': ' + amount );
                        $( this ).attr( 'amt', amount );
                        done = true;
                    }
                } );

                if( done )
                    continue;

                $( '.resources-list' ).append(
                    '<li><a href="#" resource-name="' + objects[ id ].resources[ i ].name + '" amt="' + objects[ id ].resources[ i ].amount + '">' + objects[ id ].resources[ i ].name + ': ' + objects[ id ].resources[ i ].amount + '</a></li>'
                );
            }

            updateHullIntegrity( objects[ id ].integrity );

            scene.add( obj );

            control.setTranslationSnap( new THREE.Vector3( objects[ id ].snapOffset.move.x, objects[ id ].snapOffset.move.y, objects[ id ].snapOffset.move.z ) );
            control.setRotationSnap( THREE.Math.degToRad( objects[ id ].snapOffset.rotation ) );

            currentObject = obj;

            control.attach( obj );
            scene.add( control );
//            return false;
        } );

        function Mouse3DControls(yawObject,pitchObject){
            canvas.requestPointerLock = canvas.requestPointerLock ||
                canvas.mozRequestPointerLock ||
                canvas.webkitRequestPointerLock;
            var self = this;
            this.enabled = false;
            addEventListener('mousemove',function(e){

                event.preventDefault();
                mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
                mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;

                if(self.enabled){
                    pitchObject.rotation.x -= (e.movementY|e.mozMovementY) * 0.003;
                    yawObject.rotation.y -= (e.movementX|e.mozMovementX) * 0.003;
                    pitchObject.rotation.x = Math.max(-Math.PI/2,Math.min(Math.PI/2,pitchObject.rotation.x));
                }
            });
            addEventListener( 'mousedown',function(e){
                if( e.which == 2 )
                {
                    if(!self.enabled){
                        canvas.requestPointerLock();
                    }
                }

                return true;
            });
            var pointerLockChange = function(){
                if( document.pointerLockElement === canvas || document.mozPointerLockElement === canvas ){
                    self.enabled = true;
                }else{
                    self.enabled = false;
                }
            };
            if('onpointerlockchange' in document){
                document.addEventListener('pointerlockchange',pointerLockChange);
            }else{
                document.addEventListener('webkitpointerlockchange',pointerLockChange);
                document.addEventListener('mozpointerlockchange',pointerLockChange);
            }
        }

        function Keyboard3DControls(object){
            var speed = 10;
            var self = this,
                keydown = new Array(255),
                velocity = new THREE.Vector3();
            for(var i=0;i<keydown.length;i++)keydown[i]=false;
            addEventListener('keydown',function(e){
                keydown[e.keyCode] = true;

                return false;
            });
            addEventListener('keyup',function(e){
                keydown[e.keyCode] = false;

                if( e.keyCode === 16 )
                    speed = 10;

                return false;
            });

            this.update = function(){
                object.worldToLocal(velocity);
                if( keydown[ 16 ] )
                    speed = 30;
                if(keydown[87])
                    velocity.z -= 0.01 * speed;

                if(keydown[83])
                    velocity.z += 0.01 * speed;

                if(keydown[65])
                    velocity.x -= 0.01 * speed;

                if(keydown[68])
                    velocity.x += 0.01 * speed;

                if(keydown[67])
                    velocity.y -= 0.01 * speed;

                if(keydown[32])
                    velocity.y += 0.01 * speed;

                object.localToWorld(velocity);
                object.position.add(velocity);
                velocity.multiplyScalar(0.9);
            };
        }

        init();

        if( adblocker )
        {
            var ads = JSON.parse( '{!! json_encode( $ads->skyscrapers ) !!}' );

            var rand = Math.floor( Math.random( ) * ads.length );

            $( '.sidebar-container-right' ).append(
                '<a href="' + ads[ rand ].linkurl + '" target="_blank" style="text-align: center;">' +
                '<img class="card-img img-fluid cover-image" style="width: auto; margin-top: 60px; border-radius: 0;" src="' + ads[ rand ].imgurl + '" alt="Disable adblock pl0x">' +
                '</a>'
            );
        }

    </script>
@endsection
