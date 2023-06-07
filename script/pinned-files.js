input = document.getElementById('response');
pinnedFiles = document.getElementById('pinned-files');

input.onchange = (e) => {
    var { value } = e.currentTarget;
    value = value.split('\\');
    fileName = value[value.length - 1];
    format = fileName.substring(fileName.lastIndexOf('.'), fileName.length);

    if (format === ".pdf") {
        pinnedFiles.style.color = "#227a35"
        pinnedFiles.textContent = fileName;
    } else {
        pinnedFiles.style.color = "#e44848"
        pinnedFiles.textContent = 'Файл должен быть формата .pdf';
        input.value = '';
    }
}