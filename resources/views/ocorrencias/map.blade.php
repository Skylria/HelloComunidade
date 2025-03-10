@extends('layouts.app')
@dd($ocorrencias);
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
        const locations = [
            @foreach ($address as $add)
                {
                    lat: {{ $add[0] }},
                    lng: {{ $add[1] }},
                    info: '{{ $add[2] }}'
                },
            @endforeach
        ];

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
                lat: locations[i].lat,
                lng: locations[i].lng
            };

            const pinBackground = new PinElement({
                background: 'gold',
                borderColor: '#b9a308',
                // glyph: 'P',
                glyphColor: 'white'
            });
            marker = new AdvancedMarkerElement({
                position,
                map,
                content: pinBackground.element
            });

            bounds.extend(position);

            if (locations[i].info) {
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i].info);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }

        map.fitBounds(bounds);
    }

    initMap();
</script>
