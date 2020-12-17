document.getElementById("takePictureButton").onclick = function selectFile() {
    document.getElementById("inputFile").click();
}

function sendIdentification() {
    const files = [...document.querySelector('input[type=file]').files];
    const promises = files.map((file) => {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = (event) => {
                const res = event.target.result;
                console.log(res);
                resolve(res);
            };
            reader.readAsDataURL(file)
        })
    });

    Promise.all(promises).then((base64files) => {
        console.log(base64files);

        const data = {
            api_key: "jucxN9i1yltRvEPBKyB8ednOe0yLqxgpjBXnOlYvXKlgq0yeMM",
            images: base64files,
            modifiers: ["crops_fast", "similar_images"],
            plant_language: "en",
            plant_details: ["common_names",
                "url",
                "name_authority",
                "wiki_description",
                "taxonomy",
                "synonyms"]
        };

        fetch('https://api.plant.id/v2/identify', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                suggestions = data["suggestions"];
                plantDetails = suggestions[0]["plant_details"];
                console.log('Success:', data);
                console.log('suggestions', suggestions);
                console.log('suggestions', plantDetails);
                printInformation(data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    })

};

function printInformation(input) {
    suggestions = input["suggestions"];
    metaData = input["meta_data"];
    plantDetails = suggestions[0]["plant_details"];
    plantDescription = plantDetails["wiki_description"];
    let probability = suggestions[0].probability;
    let percentage = (probability*100).toFixed(2) + '%';
    document.getElementById("speciesNamePlaceholder").value = plantDetails.common_names[0];
    document.getElementById("scientificNamePlaceholder").value = plantDetails.scientific_name;
    document.getElementById("DescriptionPlaceholder").value = plantDescription.value;
    document.getElementById("probability").innerText = percentage;
}


