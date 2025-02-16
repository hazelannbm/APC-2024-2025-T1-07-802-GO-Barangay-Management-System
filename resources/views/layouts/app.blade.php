// ...existing code...

<!-- Chatbot Section -->
<div id="chatbot">
    <button id="chatbot-toggle">Chat with us</button>
    <div id="chatbot-window" style="display: none;">
        <div id="chatbot-messages"></div>
        <input type="text" id="chatbot-input" placeholder="Type your question...">
        <button id="chatbot-send">Send</button>
    </div>
</div>

<script>
    document.getElementById('chatbot-toggle').addEventListener('click', function() {
        var chatbotWindow = document.getElementById('chatbot-window');
        chatbotWindow.style.display = chatbotWindow.style.display === 'none' ? 'block' : 'none';
    });

    document.getElementById('chatbot-send').addEventListener('click', function() {
        var input = document.getElementById('chatbot-input').value;
        var messages = document.getElementById('chatbot-messages');
        var newMessage = document.createElement('div');
        newMessage.textContent = 'You: ' + input;
        messages.appendChild(newMessage);
        document.getElementById('chatbot-input').value = '';

        // Simulate a response from the chatbot
        setTimeout(function() {
            var botMessage = document.createElement('div');
            botMessage.textContent = 'Bot: This is a response to "' + input + '"';
            messages.appendChild(botMessage);
        }, 1000);
    });
</script>

// ...existing code...
