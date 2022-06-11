<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Positive</title>
    <link rel="icon" href="/images/Logo SV.png">
    <link rel="stylesheet" href="form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="tab">
        <h2>REPORT POSITIVE</h2>
        <form onsubmit="handleFormSubmit(event)" class="form">
            <div class="question">
                <label for="Q1">1. Do you have any of the following symptoms?<span class="red">*</span></label>
                <div class="answer checkbox required">
                    <input type="checkbox" name="Q1" value="Fever" id="fever">
                    <label for="fever">Fever</label>
                    <input type="checkbox" name="Q1" value="Cough" id="cough">
                    <label for="cough">Cough</label>
                    <input type="checkbox" name="Q1" value="Shortness of breath" id="shortness">
                    <label for="shortness">Shortness of breath</label>
                    <input type="checkbox" name="Q1" value="Sore throat" id="sore">
                    <label for="sore">Sore throat</label>
                    <input type="checkbox" name="Q1" value="Difficulty breathing" id="difficulty">
                    <label for="difficulty">Difficulty breathing</label>
                    <input type="checkbox" name="Q1" value="Runny nose" id="runny">
                    <label for="runny">Runny nose</label>
                    <input type="checkbox" name="Q1" value="Loss of taste or smell" id="taste">
                    <label for="taste">Loss of taste or smell</label>
                    <input type="checkbox" name="Q1" value="Other" id="other">
                    <label for="other">Other</label>
                    <input type="checkbox" name="Q1" value="None of the above" id="none">
                    <label for="none">None of the above</label>
                </div>
            </div>
            <div class="question">
                <label for="Q2">2. Are you staying alone in the apartment?<span class="red">*</span></label>
                <div class="answer">
                    <input type="radio" name="Q2" value="Yes" id="yes-2">
                    <label for="yes-2">Yes</label>
                    <input type="radio" name="Q2" value="No" id="no-2">
                    <label for="no-2">No</label>
                </div>
            </div>
            <div class="question">
                <label for="Q3">3. When did you test positive?<span class="red">*</span></label>
                <div class="answer">
                    <input type="date" name="Q3" id="date" required>
                </div>
            </div>
            <div class="question">
                <label for="Q4">4. Type of test<span class="red">*</span></label>
                <div class="answer">
                    <input type="radio" name="Q4" value="Self-test-saliva" id="saliva" required>
                    <label for="saliva">Self test saliva</label>
                    <input type="radio" name="Q4" value="Self-test-nasal" id="nasal">
                    <label for="nasal">Self test nasal</label>
                    <input type="radio" name="Q4" value="PCR" id="pcr">
                    <label for="pcr">PCR</label>
                    <input type="radio" name="Q4" value="Other" id="other-4">
                    <label for="other-4">Other</label>

                </div>
            </div>
            <div class="question">
                <label for="Q5">5. Pre-existing disease (eg asthma, high blood pressure)</label>
                <div class="answer">
                    <input type="text" name="Q5" id="disease">
                </div>
            </div>
            <div class="comfirmation">
                <input type="checkbox" name="confirmation" value="confirmation" required>
                <span>
                    I hereby declare that all the information given in this form is true and correct.<br>
                    Action can be taken if the information provded is false.
                </span>
            </div>
            <button type="submit" class="submit">Submit</button>
        </form>
    </div>

    <script src="/navigation/navigation.js"></script>
    <script>
        const required = document.querySelectorAll('.required');

        function handleFormSubmit(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            let isValid = false;
            Array.from(required[0].children).forEach(child => {
                if (child.checked) {
                    isValid = true;
                }
            });
            if (!isValid) {
                alert('Please fill out all required fields');
                return;
            }
            formData.forEach((value, key) => {
                console.log(key, value);
            })
            window.location.href = 'covidStatus.php';
        }
    </script>
</body>
</html>