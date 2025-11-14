document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById('bookingForm');
    const result = document.getElementById('result');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        result.textContent = "Отправка...";
        result.style.color = "#444";

        const body = {
            first_name: form.first_name.value,
            last_name: form.last_name.value,
            birth: Number(form.birth.value),
            email: form.email.value,
            time_in: form.time_in.value,
            days: Number(form.days.value),
        };

        try {
            const response = await fetch('/api/bookings', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify(body),
            });

            // сначала пробуем прочитать как JSON, если сервер вернул JSON
            const text = await response.text();
            let data;

            try {
                data = JSON.parse(text);
            } catch (e) {
                // если это HTML (ошибка Laravel), покажем её в виде текста
                result.textContent = 'Ответ сервера не в формате JSON:\n' + text.slice(0, 200) + '...';
                result.style.color = 'red';
                return;
            }

            if (!response.ok) {
                result.textContent = "Ошибка: " + JSON.stringify(data);
                result.style.color = "red";
            } else {
                result.textContent = "Успешно отправлено!";
                result.style.color = "green";
                form.reset();
            }
        } catch (error) {
            result.textContent = "Ошибка сети: " + error;
            result.style.color = "red";
        }
    });
});
