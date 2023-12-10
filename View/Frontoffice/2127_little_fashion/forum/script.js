function censorInput(element) {
    const badWords = ['bad', 'inappropriate', 'offensive', 'ayeb', 'fuv', 'motherf'];
    const inputValue = element.value.toLowerCase();

    badWords.forEach(word => {
        const regex = new RegExp(word, 'gi');
        element.value = element.value.replace(regex, '*'.repeat(word.length));
    });
}


