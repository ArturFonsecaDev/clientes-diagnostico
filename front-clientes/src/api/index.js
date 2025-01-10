export default async function getPerguntas(){
  // const perguntas = [];
  const url = 'http://127.0.0.1:8000/api/perguntas';

  const response = await fetch(url, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    }
  });
  return await response.json();
}