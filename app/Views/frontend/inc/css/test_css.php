<style>
      .sheet-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f4f4f4;
        padding: 20px;
      }

      .sheet-wrapper {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 700px;
        width: 100%;
      }

      .exam-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
      }

      .exam-header h1 {
        font-size: 30px;
      }

      .exam-info {
        text-align: right;
      }

      .exam-info p {
        margin: 4px 0;
        font-size: 18px;
        color: #666;
      }

      .exam-sheet {
        margin-top: 20px;
      }

      .question {
        margin-bottom: 20px;
      }

      .answers label {
        font-size: 20px;
        color: #333;
      }

      .submit-button {
        background-color: #6c63ff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }

      .submit-button:hover {
        background-color: #5a54e7;
      }

      p{
        font-size:20px;
      }

      @media (max-width: 600px) {
        .exam-header {
          flex-direction: column;
          align-items: flex-start;
        }

        .exam-info {
          text-align: left;
          margin-top: 10px;
        }

        .submit-button {
          width: 100%;
        }
      }
    </style>