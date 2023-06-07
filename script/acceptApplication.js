applicationId = document.getElementById('applicationId').textContent;
id = applicationId.substr(applicationId.lastIndexOf('№') + 1, applicationId.length).trim();

async function acceptApplication(name) {
    console.log(id);
    let applicationData = {
        "id": id,
        "applicationName": name
    };

    console.log(JSON.stringify(applicationData));

    let response = await fetch('../../../vendor/acceptApplication.php', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json; charset=utf-8'
        },
        body: JSON.stringify(applicationData)
    })

    if (response.ok) {
        document.location = '../../profileworker.php';
        console.log(true);
    }
} 