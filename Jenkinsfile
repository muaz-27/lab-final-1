pipeline {
    agent any
    
    environment {
        APP_NAME = 'lab-final'
        PORT = '8000'
    }
    
    stages {
        stage('Checkout') {
            steps {
                echo '📦 Cloning repository...'
                checkout scm
            }
        }
        
        stage('Build Docker Image') {
            steps {
                echo '🐳 Building Docker image...'
                sh 'docker build -t ${APP_NAME}:latest .'
            }
        }
        
        stage('Test Application') {
            steps {
                echo '🧪 Testing Laravel...'
                sh 'docker run --rm ${APP_NAME}:latest php artisan --version'
            }
        }
        
        stage('Deploy Container') {
            steps {
                echo '🚀 Deploying application...'
                sh '''
                    docker stop ${APP_NAME} 2>/dev/null || true
                    docker rm ${APP_NAME} 2>/dev/null || true
                    docker run -d --name ${APP_NAME} -p ${PORT}:80 ${APP_NAME}:latest
                '''
            }
        }
        
        stage('Verify Deployment') {
            steps {
                echo '✅ Verifying deployment...'
                sh 'sleep 5'
                sh 'curl -s -o /dev/null -w "HTTP Status: %{http_code}\n" http://localhost:${PORT}'
            }
        }
    }
    
    post {
        success {
            echo '🎉 Pipeline successful!'
            echo '🌐 App running at: http://localhost:8000'
        }
        failure {
            echo '❌ Pipeline failed. Check the logs above.'
        }
    }
}
