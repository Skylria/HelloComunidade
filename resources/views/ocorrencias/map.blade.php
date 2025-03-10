@extends('layouts.app')
@section('content')
    <div class="relative w-full" style="height: calc(100vh - 156px)">
        <div id="map" class="absolute top-0 left-0 w-full h-full">
        </div>
    </div>

    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
                d[l](f, ...n))
        })({
            key: "{{ env('GOOGLE_MAPS_API_KEY') }}",
            v: "weekly",
        });
    </script>

    <script>
        let map;

        async function initMap() {
            const locations = @json($data);
            console.log(locations)

            const {
                Map
            } = await google.maps.importLibrary("maps");
            const {
                AdvancedMarkerElement,
                PinElement
            } = await google.maps.importLibrary("marker");

            map = new Map(document.getElementById("map"), {
                zoom: 14,
                center: {
                    lat: 0,
                    lng: 0
                },
                mapId: "DEMO_MAP_ID",
                disableDefaultUI: true,
            });

            var infowindow = new google.maps.InfoWindow;

            var marker, i;
            var bounds = new google.maps.LatLngBounds();

            for (i = 0; i < locations.length; i++) {
                const position = {
                    lat: +locations[i].lat,
                    lng: +locations[i].lng
                };

                console.log(position)

                const pinBackground = new PinElement({
                    background: 'gold',
                    borderColor: 'red',
                    // glyph: 'P',
                    glyphColor: 'red',
                });
                marker = new AdvancedMarkerElement({
                    position,
                    map,
                    content: pinBackground.element
                });

                bounds.extend(position);

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        const info =
                            `Titulo: ${locations[i].titulo}<br>Morador: ${locations[i].nome}<br>Tipo: ${locations[i].tipo}`;
                        infowindow.setContent(info);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }

            map.fitBounds(bounds);
            map
        }

        initMap();
    </script>
@endsection
